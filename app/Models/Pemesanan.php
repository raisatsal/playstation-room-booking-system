<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $table      = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_pelanggan',
        'id_room',
        'kode_pemesanan',
        'tanggal_pemesanan',
        'jam_mulai',
        'jam_selesai',
        'durasi_jam',
        'total_harga',
        'metode_pembayaran',
        'status_pembayaran',
        'status_pemesanan',
    ];

    protected $casts = [
        'tanggal_pemesanan' => 'date',
        'total_harga'       => 'decimal:2',
    ];

    public function pelanggan(): BelongsTo

    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function room(): BelongsTo

    {
        return $this->belongsTo(Room::class, 'id_room', 'id_room');
    }
}