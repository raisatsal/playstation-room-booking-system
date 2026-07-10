<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nama_pelanggan',
        'nomor_telepon',
        'email',
        'alamat',
    ];

    public function detail(): HasOne
    {

        return $this->hasOne(DetailPelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function pemesanan(): HasMany
    {

        return $this->hasMany(Pemesanan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class, 'email', 'email');
    }
}