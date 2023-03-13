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
        Schema::create('perusahaan__daftar__events', function (Blueprint $table) {
            $table->id();
             $table->unsignedInteger('id_perusahaan');
            $table->unsignedInteger('id_event');
            $table->string('nama_pic');
            $table->string('jabatan_pic');
            $table->string('persetujuan');
             $table->text('alasan_ditolak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan__daftar__events');
    }
};
