<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    public function lightsRooms()
    {
        return $this->hasMany(LightsRooms::class, 'id_room', 'id');
    }
}
