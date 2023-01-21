<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lights extends Model
{
    use HasFactory;

    public function lightsRooms(): HasMany
    {
        return $this->hasMany(LightsRooms::class, 'id_light', 'id');
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Rooms::class, 'lights_rooms', 'id_light', 'id_room');
    }
}
