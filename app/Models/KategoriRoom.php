<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriRoom extends Model
{
    protected $table      = 'kategori_room';
    protected $primaryKey = 'id_kategori_room';

    protected $fillable = [
        'nama_kategori',
        'harga_tambahan',
        'deskripsi',
    ];

    protected $casts = [
        'harga_tambahan' => 'decimal:2',
    ];

    public function room(): HasMany

    {
        return $this->hasMany(Room::class, 'id_kategori_room', 'id_kategori_room');
    }
}