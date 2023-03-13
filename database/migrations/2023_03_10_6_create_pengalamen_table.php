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
        Schema::create('pengalamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pencaker')->references('id')->on('pencakers');
            $table->string('nama_perusahaan');
            $table->string('jabatan');
            $table->date('tahun_masuk');
            $table->date('tahun_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalamen');
    }
};