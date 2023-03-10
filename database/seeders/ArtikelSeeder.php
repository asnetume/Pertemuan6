<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artikel::insert([
            'id_user' => 1,
            'judul' => 'contoh artikel',
            'isi' => 'isi artikel',
        ]);
    }
}
