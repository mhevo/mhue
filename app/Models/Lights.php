<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lights extends Model
{
    use HasFactory;

//    protected static function booted()
//    {
//        parent::booted();
//
//        if ($this->id <= 0) {
//            return;
//        }
//
//        $state = $this->state()->first();
//        $state->pullState($this->id);
//
//    }

    public function lightsRooms(): HasMany
    {
        return $this->hasMany(LightsRooms::class, 'id_light', 'id');
    }

    public function bridge(): HasOne
    {
        return $this->hasOne(Bridges::class, 'id', 'id_bridge');
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Rooms::class, 'lights_rooms', 'id_light', 'id_room');
    }

    public function state(): HasOne
    {
        return $this->hasOne(LightStates::class, 'id_light', 'id');
    }
}
