<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fasilitas extends Model
{
    protected $table      = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'keterangan',
    ];

    public function room(): BelongsToMany

    {
        return $this->belongsToMany(
            Room::class,
            'room_fasilitas',
            'id_fasilitas',
            'id_room'
        )->withTimestamps();
    }
}