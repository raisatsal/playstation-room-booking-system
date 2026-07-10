<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room', function (Blueprint $table) {
            $table->id('id_room');
            $table->unsignedBigInteger('id_kategori_room');
            $table->unsignedBigInteger('id_jenis_playstation');
            $table->string('kode_room', 20)->unique();
            $table->string('nama_room', 100);
            $table->decimal('harga_per_jam', 10, 2);
            $table->integer('kapasitas_orang')->default(1);
            $table->enum('status_room', ['tersedia', 'dipakai', 'maintenance'])
                  ->default('tersedia');
            $table->string('foto_room')->nullable();
            $table->timestamps();

            $table->foreign('id_kategori_room')
                  ->references('id_kategori_room')
                  ->on('kategori_room')
                  ->onDelete('restrict');

            $table->foreign('id_jenis_playstation')
                  ->references('id_jenis_playstation')
                  ->on('jenis_playstation')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};