<?php

namespace App\Http\Controllers;

use App\Models\Lights;
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
        return json_encode(
            [
                'state' => $state === true ? 'on' : 'off',
                'light_id' => $idLight
            ]
        );
    }

    public function pullstate(Request $request, $lightId)
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
