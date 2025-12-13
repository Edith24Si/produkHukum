<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimPengembangController extends Controller
{
    public function index()
    {
        // Data Tim Pengembang
        $developers = [
            [
                'name' => 'Ahmad Fauzi',
                'role' => 'Frontend Developer',
                'nim' => '202151001',
                'prodi' => 'Teknik Informatika',
                'email' => 'ahmad.fauzi@example.com',
                'specialization' => 'React, Vue.js, UI/UX Design',
                'photo_url' => asset('images/tim/foto-ahmad.jpg'),
                'linkedin' => 'https://linkedin.com/in/ahmad-fauzi',
                'github' => 'https://github.com/ahmadfauzi',
                'twitter' => 'https://twitter.com/ahmadfauzi',
                'instagram' => 'https://instagram.com/ahmad.fauzi'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'role' => 'Backend Developer',
                'nim' => '202151002',
                'prodi' => 'Sistem Informasi',
                'email' => 'siti.nurhaliza@example.com',
                'specialization' => 'Node.js, Python, Database Management',
                'photo_url' => asset('images/tim/foto-siti.jpg'),
                'linkedin' => 'https://linkedin.com/in/sitinurhaliza',
                'github' => 'https://github.com/sitinurhaliza',
                'twitter' => 'https://twitter.com/sitinurhaliza',
                'instagram' => null
            ],
            [
                'name' => 'Budi Santoso',
                'role' => 'Full Stack Developer',
                'nim' => '202151003',
                'prodi' => 'Teknik Komputer',
                'email' => 'budi.santoso@example.com',
                'specialization' => 'Laravel, React, DevOps',
                'photo_url' => asset('images/tim/foto-budi.jpg'),
                'linkedin' => 'https://linkedin.com/in/budisantoso',
                'github' => 'https://github.com/budisantoso',
                'twitter' => 'https://twitter.com/budisantoso',
                'instagram' => 'https://instagram.com/budi.santoso'
            ],
        ];

        // Data Video
        $videos = [
            [
                'title' => 'How Quinn Emanuel Turned a Seven-Year Fraud Case Into a Complete Victory: Part 3',
                'author' => 'EVAN HESS'
            ],
            [
                'title' => 'How Quinn Emanuel Turned a Seven-Year Fraud Case Into a Complete Victory: Part 2',
                'author' => 'NICHOLAS HOY'
            ],
            [
                'title' => 'How Quinn Emanuel Turned a Seven-Year Fraud Case Into a Complete Victory: Part 1',
                'author' => 'ELLISON MERKEL'
            ],
        ];

        return view('pages.tim-pengembang', compact('developers', 'videos'));
    }
}
