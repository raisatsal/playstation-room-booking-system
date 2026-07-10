<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoomFasilitas extends Model
{
    protected $table      = 'room_fasilitas';
    protected $primaryKey = 'id_room_fasilitas';

    protected $fillable = [
        'id_room',
        'id_fasilitas',
    ];
}