<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_room');
            $table->string('kode_pemesanan', 20)->unique();
            $table->date('tanggal_pemesanan');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('durasi_jam');
            $table->decimal('total_harga', 12, 2);
            $table->enum('metode_pembayaran', ['cash', 'transfer', 'qris'])
                  ->default('cash');
            $table->enum('status_pembayaran', ['belum_bayar', 'sudah_bayar'])
                  ->default('belum_bayar');
            $table->enum('status_pemesanan', ['aktif', 'selesai', 'dibatalkan'])
                  ->default('aktif');
            $table->timestamps();

            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')
                  ->on('pelanggan')
                  ->onDelete('restrict');

            $table->foreign('id_room')
                  ->references('id_room')
                  ->on('room')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};