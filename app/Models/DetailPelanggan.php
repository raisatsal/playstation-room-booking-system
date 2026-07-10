<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPelanggan extends Model
{
    protected $table      = 'detail_pelanggan';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_pelanggan',
        'nik',
        'tanggal_lahir',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function pelanggan(): BelongsTo

    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}