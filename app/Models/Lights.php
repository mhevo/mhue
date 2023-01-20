<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lights extends Model
{
    use HasFactory;

    public function lightsRooms()
    {
        return $this->hasMany(LightsRooms::class, 'id_light', 'id');
    }

    public function rooms()
    {
        return $this->belongsToMany(Rooms::class, 'lights_rooms', 'id_light', 'id_room');
    }
}
