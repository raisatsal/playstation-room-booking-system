<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPlaystation extends Model
{
    protected $table      = 'jenis_playstation';
    protected $primaryKey = 'id_jenis_playstation';

    protected $fillable = [
        'nama_playstation',
        'generasi',
        'keterangan',
    ];

    public function room(): HasMany

    {
        return $this->hasMany(Room::class, 'id_jenis_playstation', 'id_jenis_playstation');
    }
}