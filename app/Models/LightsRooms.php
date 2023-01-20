<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightsRooms extends Model
{
    use HasFactory;

    public function light()
    {
        return $this->hasOne(Lights::class, 'id', 'id_light');
    }

    public function room()
    {
        return $this->hasOne(Rooms::class, 'id', 'id_room');
    }
}
