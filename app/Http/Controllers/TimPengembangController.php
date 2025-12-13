<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimPengembangController extends Controller
{
    public function index()
    {
        // Data Tim Pengembang - Ganti dengan data asli Anda
        $developers = [
            [
                'name' => 'Nama Lengkap Anda 1',
                'role' => 'Frontend Developer',
                'nim' => 'NIM123456',
                'prodi' => 'Teknik Informatika',
                'email' => 'emailanda1@example.com',
                'specialization' => 'HTML, CSS, JavaScript, React',
                'photo' => 'foto1.jpg', // Nama file foto di public/images/tim/
                'linkedin' => 'https://linkedin.com/in/username1',
                'github' => 'https://github.com/username1',
                'twitter' => 'https://twitter.com/username1',
                'instagram' => 'https://instagram.com/username1',
                'whatsapp' => 'https://wa.me/6281234567890' // Opsional
            ],
            [
                'name' => 'Nama Lengkap Anda 2',
                'role' => 'Backend Developer',
                'nim' => 'NIM234567',
                'prodi' => 'Sistem Informasi',
                'email' => 'emailanda2@example.com',
                'specialization' => 'PHP, Laravel, MySQL, REST API',
                'photo' => 'foto2.jpg',
                'linkedin' => 'https://linkedin.com/in/username2',
                'github' => 'https://github.com/username2',
                'twitter' => null, // Bisa null jika tidak ada
                'instagram' => 'https://instagram.com/username2',
                'whatsapp' => null
            ],
            [
                'name' => 'Nama Lengkap Anda 3',
                'role' => 'UI/UX Designer',
                'nim' => 'NIM345678',
                'prodi' => 'Desain Komunikasi Visual',
                'email' => 'emailanda3@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo' => 'foto3.jpg',
                'linkedin' => 'https://linkedin.com/in/username3',
                'github' => 'https://github.com/username3',
                'twitter' => 'https://twitter.com/username3',
                'instagram' => 'https://instagram.com/username3',
                'whatsapp' => 'https://wa.me/6281234567891'
            ],
            // Tambahkan anggota tim lainnya...
        ];

        // Tambahkan URL foto lengkap
        foreach ($developers as &$developer) {
            $photoPath = 'images/tim/' . $developer['photo'];
            $developer['photo_url'] = file_exists(public_path($photoPath))
                ? asset($photoPath)
                : 'https://ui-avatars.com/api/?name=' . urlencode($developer['name']) . '&size=200&background=4e73df&color=fff';
        }

        return view('pages.tim-pengembang', compact('developers'));
    }
}
