<?php

namespace App\Http\Controllers;

use App\Models\BridgeModel;
use App\Models\Bridges;
use App\Models\Lights;
use App\Models\LightsRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Phue\Client;
use Phue\Light;

class BridgeController extends Controller
{
    public function show($type = null, $importedLines = 0)
    {
        $bridges = Bridges::all();
        $params = ['bridges' => $bridges];
        if (isset($type) === true) {
            $params['type'] = $type;
        }
        if (isset($importedLines) === true) {
            $params['lines'] = $importedLines;
        }
        return view('config.bridge', $params);
    }

    public function new(Request $request)
    {
        $label = $request->input('label');
        $ip = $request->input('ip');
        $username = $request->input('username');

        $b = new Bridges();
        $b->label = $label;
        $b->ip = $ip;
        $b->username = $username;
        $b->save();

        dd($label, $ip, $username);
    }

    public function import($type, $bridgeId)
    {
        if ((int) $bridgeId <= 0) {
            return 'no bridge id found';
        }
        $importedLines = 0;
        switch ($type) {
            case 'lights':
                $importedLines = $this->importLights((int) $bridgeId);
                break;
            case 'rooms':
                $importedLines = $this->importRooms((int) $bridgeId);
                break;
        }
        return $this->show($type, $importedLines);
//        return view('config.bridge', ['type' => $type, 'lines' => $importedLines]);
    }

    /**
     * @param int $bridgeId
     * @return int
     */
    private function importLights(int $bridgeId): int
    {
        $bridge = Bridges::where('id', $bridgeId)->first();
        $client = $this->getClient($bridge->ip, $bridge->username);
        $lights = $client->getLights();

        $c = 0;
        foreach ($lights as $light) {
            $cLights = Lights::where('hue_id', $light->getId())->where('id_bridge', $bridgeId)->count();
            if ($cLights > 0) {
                continue;
            }
            $l = new Lights();
            $l->id_bridge = $bridgeId;
            $l->label = $light->getName();
            $l->hue_id = $light->getId();
            $l->hue_type = $light->getType();
            $l->hue_name = $light->getName();
            $l->hue_modelid = $light->getModelId();
            $l->hue_manufacturername = $light->getManufacturerName();
            $l->hue_productname = $light->getProductName();
            $l->hue_uniqueid = $light->getUniqueId();
            $l->hue_swversion = $light->getSoftwareVersion();
            $l->hue_swconfigid = '';
            $l->hue_productid = '';
            $l->save();
            $c++;
        }
        return $c;
    }

    private function importRooms(int $bridgeId): int
    {
        /**
         * @todo import type zone as zone not as room, see "Badezimmer, Obergeschoß"
         */
        $bridge = Bridges::where('id', $bridgeId)->first();
        $client = $this->getClient($bridge->ip, $bridge->username);
        $rooms = $client->getGroups();

        $c = 0;
        foreach ($rooms as $room) {
            $cRoom = Rooms::where('hue_id', $room->getId())->where('id_bridge', $bridgeId)->count();
            if ($cRoom > 0) {
                continue;
            }
            $r = new Rooms();
            $r->id_bridge = $bridgeId;
            $r->label = $room->getName();
            $r->hue_id = $room->getId();
            $r->hue_type = $room->getType();
            $r->hue_name = $room->getName();
            $r->hue_class = $room->getClass();
            $r->save();
            $c++;

            $lights = $room->getLightIds();
            if (empty($lights) === true) {
                continue;
            }
            foreach ($lights as $light) {
                $mhLight = Lights::where('hue_id', $light)->where('id_bridge', $bridgeId)->first();
                if ($mhLight === false) {
                    continue;
                }
                $cLightRoom = LightsRooms::where('id_light', $mhLight->id)
                    ->where('id_room', $r->id)
                    ->count();
                if ($cLightRoom > 0) {
                    continue;
                }
                $lr = new LightsRooms();
                $lr->id_light = $mhLight->id;
                $lr->id_room = $r->id;
                $lr->save();
            }
        }
        return $c;
    }


    /**
     * @return Client
     */
    public function getClient($ip, $username): Client
    {
        return new Client($ip, $username);
    }
}
