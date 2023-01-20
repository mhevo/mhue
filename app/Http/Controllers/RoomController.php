<?php

namespace App\Http\Controllers;

use App\Models\Lights;
use App\Models\LightsRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function listRooms()
    {
        $rooms = Rooms::all()->sortBy('label');

        $params = ['rooms' => $rooms];
        return view('config.rooms', $params);
    }

    public function showRoom($roomId)
    {
        $room = Rooms::where('id', (int) $roomId)->first();

//        $assignedLights = LightsRooms::where('id_room', (int) $roomId)->get();
        $assignedLightsRooms = $room->lightsRooms()->get();
        $assignedLights = null;
        $assignedLightsArray = [];
        foreach ($assignedLightsRooms as $alr) {
            $tmp = $alr->light()->get();
            if (count($tmp) > 0) {
                foreach ($tmp as $t) {
                    $assignedLightsArray[] = $t->id;
                }
            }
            if ($assignedLights === null) {
                $assignedLights = $tmp;
            } else {
                $assignedLights = $assignedLights->merge($tmp);
            }
        }

        $unassignedLights = Lights::whereNotIn('id', $assignedLightsArray)->orderBy('label')->get();
        $usedRoom = [];
        foreach ($unassignedLights as $uAL) {
            $inRooms = [];
            $rooms = $uAL->rooms()->get();
            foreach ($rooms as $tmpRoom) {
                $inRooms[] = $tmpRoom->label;
            }
            $strRooms = implode(',', $inRooms);
            $usedRoom[$uAL->id] = $strRooms;
        }

        $params = [
            'room' => $room,
            'assignedLights' => $assignedLights,
            'unAssignedLights' => $unassignedLights,
            'usedRoom' => $usedRoom,
        ];
        return view('config.roomedit', $params);
    }

    public function editRoom($roomId, Request $request)
    {
        $room = Rooms::where('id', (int) $roomId)->first();
        $room->label = $request->get('label');
        $room->save();

        $params = ['room' => $room];
        return view('config.roomedit', $params);
    }

    public function deleteRoom($roomId)
    {
        $room = Rooms::where('id', (int) $roomId)->first();
        $room->delete();

        return $this->listRooms();
    }

    public function addLightsToRoom(Request $request)
    {
        $idRoom = (int) $request->get('room-id');
        if ($idRoom <= 0) {
            return false;
        }

        $idLights = $request->get('light-ids');
        $out = [];
        foreach ($idLights as $idL) {
            $idLight = (int) $idL;
            if ($idLight <= 0) {
                continue;
            }

            $lsrs = LightsRooms::where('id_room', $idRoom)->where('id_light', $idLight)->get();

            if (count($lsrs) > 0) {
                continue;
            }

            $lightsRooms = new LightsRooms();
            $lightsRooms->id_light = $idLight;
            $lightsRooms->id_room = $idRoom;
            $lightsRooms->save();

            $light = Lights::where('id', $idLight)->first();
            $out[] = '<div class="row">
    <div class="col-12">
        <i class="fa-solid fa-lightbulb"></i> ' . $light->label . ' <a href="/configuration/rooms/delete/light/' . $light->id . '"><i class="fa-solid fa-trash-can"></i></a>
    </div>
</div>
';
        }
        return json_encode($out);
    }
}
