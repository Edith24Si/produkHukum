<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['User'];
        // Tambahkan 'role' ke kolom pencarian
        $searchableColumns = ['name', 'email', 'username', 'role'];

        $data = User::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(10)
            ->withQueryString();

        return view('pages.user.index', compact('data'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'username'        => 'required|string|unique:users,username',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|min:8|confirmed',
            'role'            => 'required|in:admin,user', // Validasi Role

            // Validasi Gambar: boleh kosong, format gambar, max 2MB
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $path = null;
        if ($request->hasFile('profile_picture')) {
            // Simpan gambar ke storage/app/public/profile-pictures
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        User::create([
            'name'            => $request->name,
            'username'        => $request->username,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'role'            => $request->role, // Simpan Role
            'profile_picture' => $path,          // Simpan path gambar
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'username'        => 'required|string|unique:users,username,' . $user->id,
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'password'        => 'nullable|min:8|confirmed',
            'role'            => 'required|in:admin,user', // Validasi Role
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dataToUpdate = [
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'role'     => $request->role, // Update Role
        ];

        // 1. Tangani Unggahan Foto Baru
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            // Simpan foto baru
            $dataToUpdate['profile_picture'] = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        $user->update($dataToUpdate);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if (Auth::id() == $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        // Hapus file foto dari storage sebelum menghapus record dari DB
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil dihapus.');
    }
}
