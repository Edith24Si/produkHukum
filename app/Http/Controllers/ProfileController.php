<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the edit profile form
    public function edit()
    {
        // PERBAIKAN DI SINI:
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Kirim variable $user ke view
        return view('profile.edit', compact('user'));
    }

    // Update the user's profile picture
    public function update(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name'            => 'required|string|max:255',
            'username'        => 'required|string|unique:users,username,' . $user->id,
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'password'        => 'nullable|min:8|confirmed',

        ]);
        $dataToUpdate = [
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
        ];

        $user = Auth::user();

        // Tangani Upload/Update Foto Profil
        if ($request->hasFile('profile_picture')) {

            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                // Cek dulu apakah file fisik benar-benar ada untuk menghindari error
                if (Storage::disk('public')->exists($user->profile_picture)) {
                    Storage::disk('public')->delete($user->profile_picture);
                }
            }

            // Store the new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');

            // Update Data User
            $user->update($dataToUpdate);

            return redirect()->route('profile.edit')
                ->with('success', 'Profil Anda berhasil diperbarui!');
        }

        // Simpan path ke database (tanpa perlu mendefinisikan variabel $user lagi karena objectnya reference)
        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile picture updated successfully!');
    }

    // Show the user's profile
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Delete the user's profile picture
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            // Hapus file dari storage jika ada
            if (Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Set null di database
            $user->profile_picture = null;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Profile picture deleted successfully!');
    }
}
