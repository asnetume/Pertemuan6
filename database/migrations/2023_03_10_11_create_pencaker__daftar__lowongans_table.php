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
        Schema::create('pencaker__daftar__lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pencaker')->references('id')->on('pencakers');
            $table->foreignId('id_lowongan')->references('id')->on('lowongans');
             $table->text('lamaran');
             $table->string('cv');
             $table->string('status_lamaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencaker__daftar__lowongans');
    }
};
