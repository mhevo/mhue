<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rooms extends Model
{
    use HasFactory;

    public function lightsRooms(): HasMany
    {
        return $this->hasMany(LightsRooms::class, 'id_room', 'id');
    }

    public function lights(): BelongsToMany
    {
        return $this->belongsToMany(Lights::class, 'lights_rooms', 'id_room', 'id_light');
    }
}
