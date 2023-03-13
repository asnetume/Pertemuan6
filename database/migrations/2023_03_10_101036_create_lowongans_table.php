<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_perusahaan');
            $table->unsignedInteger('id_perusahaan_daftar_event');
            $table->string('posisi');
            $table->unsignedInteger('kuota');
            $table->string('tugas');
            $table->unsignedInteger('gaji');
            $table->string('fasilitas');
            $table->text('deskripsi');
            $table->string('jenis_kelamin');
            $table->integer('usia_minimal');
            $table->integer('usai_maximal');
            $table->string('kualifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
