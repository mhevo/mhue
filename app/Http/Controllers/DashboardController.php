<?php

namespace App\Http\Controllers;

use App\Models\Lights;
use App\Models\LightsRooms;
use App\Models\LightStates;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Phue\Client;
use Phue\Command\SetLightState;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $rooms = Rooms::all()->sortBy('label');

        $params = [];
        foreach ($rooms as $room) {
            if ($room->id <= 0) {
                continue;
            }
            $lights = $room->lights()->orderBy('label')->get();

            $states = [];
            $anyLightInRoomOn = false;
            foreach ($lights as $light) {
                $state = $light->state()->first();
                $states[$light->id] = $state;
                if ($state->on === 1) {
                    $anyLightInRoomOn = true;
                }
            }

            $params[] = [
                'room' => $room,
                'lights' => $lights,
                'states' => $states,
                'anyLightInRoomOn' => $anyLightInRoomOn,
            ];
        }

        return view('start', ['params' => $params]);
    }

    public function switchlight(Request $request)
    {
        $rState = $request->get('state');
        $idLight = (int) $request->get('light_id');

        $state = true;
        if ($rState === 'on') {
            $state = false;
        }

        $light = Lights::where('id', $idLight)->first();
        $bridge = $light->bridge()->first();

        $client = new Client($bridge->ip, $bridge->username);
        $setLightState = new SetLightState($light->hue_id);
        $setLightState->on($state);

        $client->sendCommand($setLightState);

        $this->pullstate($idLight);

        $roomIds = [];
        $lightsRooms = LightsRooms::where('id_light', $idLight)->get();
        foreach ($lightsRooms as $lightsRoom) {
            $roomIds[] = $lightsRoom->id_room;
        }

        return json_encode(
            [
                'state' => $state === true ? 'on' : 'off',
                'light_id' => $idLight,
                'room_ids' => $roomIds
            ]
        );
    }

    public function switchroom(Request $request)
    {
        $rState = $request->get('state');
        $idRoom = (int) $request->get('room_id');

        $state = true;
        if ($rState === 'on') {
            $state = false;
        }

        $lightsRooms = LightsRooms::where('id_room', $idRoom)->get();
        $lightIds = [];
        foreach ($lightsRooms as $lightRoom) {
            $light = $lightRoom->light()->first();
            $bridge = $light->bridge()->first();

            $client = new Client($bridge->ip, $bridge->username);
            $setLightState = new SetLightState($light->hue_id);
            $setLightState->on($state);

            $client->sendCommand($setLightState);

            $this->pullstate($light->id);
            $lightIds[] = $light->id;
        }

        return json_encode(
            [
                'state' => $state === true ? 'on' : 'off',
                'room_id' => $idRoom,
                'light_ids' => $lightIds
            ]
        );
    }

    public function roomcolor(Request $request)
    {
        $idRoom = (int) $request->get('room_id');
        $color = $request->get('color');
        $rgbColors = [];
        $state = true;

        preg_match_all('/[0-9\.]+/', $color, $rgbColors);

        if (isset($rgbColors[0]) === false || count($rgbColors[0]) !== 4) {
            return json_encode(
                [
                    'status' => '500',
                    'error' => 'Wrong RGB color'
                ]
            );
        }

        $colorRed = $rgbColors[0][0];
        $colorGreen = $rgbColors[0][1];
        $colorBlue = $rgbColors[0][2];
        $colorBrightness = $rgbColors[0][3];

        $lightsRooms = LightsRooms::where('id_room', $idRoom)->get();
        $lightIds = [];
        foreach ($lightsRooms as $lightRoom) {
            $light = $lightRoom->light()->first();
            $bridge = $light->bridge()->first();

            $client = new Client($bridge->ip, $bridge->username);
            $setLightState = new SetLightState($light->hue_id);
            $setLightState->on($state);

            $setLightState->rgb($colorRed, $colorGreen, $colorBlue);
            $setLightState->brightness($light->convertBrightness($colorBrightness));

            $client->sendCommand($setLightState);

            $this->pullstate($light->id);
            $lightIds[] = $light->id;
        }

        return json_encode(
            [
                'state' => $state === true ? 'on' : 'off',
                'room_id' => $idRoom,
                'light_ids' => $lightIds
            ]
        );
    }

    public function pullstate($lightId)
    {
        $ls = new LightStates();
        $ls->pullState($lightId);
    }

    public function pullstates()
    {
        $lights = Lights::all();
        foreach ($lights as $light) {
            $ls = new LightStates();
            $ls->pullState($light->id);
        }
    }
}
