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
        Schema::create('pencakers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_provinsi')->references('id')->on('provinsis');
            $table->string('nama');
            $table->date('tangal_lahir');
            $table->string('jenis_kelamin');
            $table->unsignedInteger('telpon');
            $table->unsignedInteger('ktp');
            $table->string('disabilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencakers');
    }
};
