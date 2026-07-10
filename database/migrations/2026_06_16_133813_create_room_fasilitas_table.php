<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_fasilitas', function (Blueprint $table) {
            $table->id('id_room_fasilitas');
            $table->unsignedBigInteger('id_room');
            $table->unsignedBigInteger('id_fasilitas');
            $table->timestamps();

            // Satu room tidak boleh punya fasilitas yang sama dua kali
            $table->unique(['id_room', 'id_fasilitas']);

            $table->foreign('id_room')
                  ->references('id_room')
                  ->on('room')
                  ->onDelete('cascade');

            $table->foreign('id_fasilitas')
                  ->references('id_fasilitas')
                  ->on('fasilitas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_fasilitas');
    }
};