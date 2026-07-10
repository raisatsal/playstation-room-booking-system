<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_playstation', function (Blueprint $table) {
            $table->id('id_jenis_playstation');
            $table->string('nama_playstation', 100);
            $table->string('generasi', 50)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_playstation');
    }
};