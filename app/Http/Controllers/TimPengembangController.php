<?php
namespace App\Http\Controllers;

class TimPengembangController extends Controller
{
    public function index()
    {
        // Data tim pengembang dengan foto
        $developers = [
            [
                'name'           => 'GUEST Fitriana Tasya',
                'role'           => 'Frontend Developer',
                'nim'            => 'NIM123456',
                'prodi'          => 'Sistem Informasi',
                'email'          => 'fitriana24si@mahasiswa.pcr.ac.id',
                'specialization' => 'Laravel, CSS/HTML, JavaScript',
                'photo'          => 'FitrianaTasya.jpg', // Nama file di public/images/tim/
                'linkedin'       => 'https://linkedin.com/in/fitrianatasya',
                'github'         => 'https://github.com/fitrianatasya',
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/fitrianatasya',
                'whatsapp'       => 'https://wa.me/6281234567890',
            ],
            [
                'name'           => 'ADMIN Edith Helena',
                'role'           => 'Developer',
                'nim'            => 'NIM234567',
                'prodi'          => 'Sistem Informasi',
                'email'          => 'edith24si@mahasiswa.pcr.ac.id',
                'specialization' => 'PHP, MySQL, REST API',
                'photo'          => 'EdithHelena.jpg', // Nama file di public/images/tim/
                'linkedin'       => 'https://linkedin.com/in/edithhelena',
                'github'         => 'https://github.com/Edith24Si',
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/editha.nl',
                'whatsapp'       => 'https://wa.me/6287714351335',
            ],
            [
                'name'           => 'SUPPORT SYSTEM',
                'role'           => 'Project Manager & Full Stack Developer',
                'nim'            => 'NIM000001',
                'prodi'          => 'Ilmu Hukum Digital',
                'email'          => 'admin@hukum.com',
                'specialization' => 'Sistem Hukum Digital, Database Management',
                'photo'          => 'edith helena cantik.jpg',// Nama file di public/images/tim/
                'linkedin'       => 'https://linkedin.com/in/admin-hukum',
                'github'         => 'https://github.com/Edith24Si',
                'twitter'        => 'https://twitter.com/admin_hukum',
                'instagram'      => 'https://instagram.com/admin.hukum',
                'whatsapp'       => 'https://wa.me/6281234567891',
            ],
            // Tambahkan anggota tim lainnya jika ada
            [
                'name'           => 'SUPPORT SYSTEM',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],

             [
                'name'           => 'Anggota Tim 5',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],

             [
                'name'           => 'Anggota Tim 6',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],

             [
                'name'           => 'Anggota Tim 7',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],

             [
                'name'           => 'Anggota Tim 8',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],

             [
                'name'           => 'Anggota Tim 9',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],

             [
                'name'           => 'Anggota Tim ',
                'role'           => 'UI/UX Designer',
                'nim'            => 'NIM345678',
                'prodi'          => 'Desain Komunikasi Visual',
                'email'          => 'designer@example.com',
                'specialization' => 'Figma, Adobe XD, User Research, Prototyping',
                'photo'          => 'foto-designer.jpg',
                'linkedin'       => 'https://linkedin.com/in/designer',
                'github'         => null,
                'twitter'        => null,
                'instagram'      => 'https://instagram.com/designer',
                'whatsapp'       => null,
            ],
        ];

        // Tambahkan URL foto lengkap
        foreach ($developers as &$developer) {
            // Cek foto di beberapa lokasi
            $photoPaths = [
                'images/tim/' . $developer['photo'],
                'storage/' . $developer['photo'],
                'storage/profile-pictures/' . $developer['photo'],
            ];

            $found = false;
            foreach ($photoPaths as $path) {
                if (file_exists(public_path($path))) {
                    $developer['photo_url'] = asset($path);
                    $found                  = true;
                    break;
                }
            }

            // Jika tidak ditemukan, gunakan avatar dari inisial
            if (! $found) {
                $developer['photo_url'] = 'https://ui-avatars.com/api/?name=' .
                urlencode($developer['name']) .
                    '&size=200&background=4e73df&color=fff&bold=true';
            }
        }

        return view('pages.tim-pengembang', compact('developers'));
    }
}
