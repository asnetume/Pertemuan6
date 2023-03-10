<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::insert([
            'id_user' => 1,
            'id_provinsi' => 1,
            'deskripsi' => 'isi deskripsi',
            'status' => 'aktiv',
            'exp_date' => '2024-04-30',
            'judul' => 'ini judul',
        ]);
    }
}
