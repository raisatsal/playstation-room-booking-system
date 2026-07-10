<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPemesanan extends Model
{
    // Nama view database
    protected $table = 'view_laporan_pemesanan';

    // Primary key view
    protected $primaryKey = 'id_pemesanan';

    // Matikan auto-increment karena model ini membaca dari database view
    public $incrementing = false;

    // Matikan timestamps manual bawaan Eloquent
    public $timestamps = false;

    protected $casts = [
        'tanggal_pemesanan' => 'date',
        'total_harga'       => 'decimal:2',
        'created_at'        => 'datetime',
    ];
}
