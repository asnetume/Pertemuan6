<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lowongan::insert([
            'id_perusahaan' => 1,
            'id_user' => 1,
            'id_event' => 1,
            'posisi' => 'laravel development',
            'kuota' => 10,
            'tugas' => 'membuat project',
            'gaji' => 5000000,
            'fasilitas' => 'BPJS',
            'deskripsi' => 'ini text',
            'jenis_kelamin' => 'jenis_kelamin',
            'usia_minimal' => 'ini usia_minimal',
            'usai_maximal' => 'usai_maximal',
            'kualifikasi' => 'kualifikasi',
        ]);
    }
}
