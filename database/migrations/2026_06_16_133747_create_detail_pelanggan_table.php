<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pelanggan', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_pelanggan')->unique();
            $table->string('nik', 20)->unique();
            $table->date('tanggal_lahir')->nullable();
            $table->timestamps();

            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')
                  ->on('pelanggan')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pelanggan');
    }
};