<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $table      = 'room';
    protected $primaryKey = 'id_room';

    protected $fillable = [
        'id_kategori_room',
        'id_jenis_playstation',
        'kode_room',
        'nama_room',
        'harga_per_jam',
        'kapasitas_orang',
        'status_room',
        'foto_room',
    ];

    protected $casts = [
        'harga_per_jam' => 'decimal:2',
    ];

    public function kategori(): BelongsTo
    {

        return $this->belongsTo(KategoriRoom::class, 'id_kategori_room', 'id_kategori_room');
    }

    public function jenisPlaystation(): BelongsTo

    {
        return $this->belongsTo(JenisPlaystation::class, 'id_jenis_playstation', 'id_jenis_playstation');
    }

    public function fasilitas(): BelongsToMany

    {
        return $this->belongsToMany(
            Fasilitas::class,
            'room_fasilitas',
            'id_room',
            'id_fasilitas'
        )->withTimestamps();
    }

    public function pemesanan(): HasMany

    {
        return $this->hasMany(Pemesanan::class, 'id_room', 'id_room');
    }
}