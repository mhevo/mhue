<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Phue\Client;
use Phue\Command\GetLightById;
use Phue\Light;

class LightStates extends Model
{
    use HasFactory;

    public function pullState($idLight): void
    {
        $errors = [];
        try {
            $light = Lights::where('id', $idLight)->first();
            $bridge = Bridges::where('id', $light->id_bridge)->first();
            $client = new Client($bridge->ip, $bridge->username);

            $hlight = new GetLightById($light->hue_id);
            $hueLight = $hlight->send($client);

            $ls = LightStates::where('id_light', $idLight)->first();
            if ($ls === null) {
                $ls = new LightStates();
                $ls->id_light = $idLight;
            }

            try {
                $ls->on = (int)$hueLight->isOn();
            } catch (\Exception $e) {
                $ls->on = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->brightness = $hueLight->getBrightness();
            } catch (\Exception $e) {
                $ls->brightness = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->hue = $hueLight->getHue();
            } catch (\Exception $e) {
                $ls->hue = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->saturation = $hueLight->getSaturation();
            } catch (\Exception $e) {
                $ls->saturation = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->effect = $hueLight->getEffect() ?? 0;
            } catch (\Exception $e) {
                $ls->effect = '';
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->x = $hueLight->getXY()['x'];
            } catch (\Exception $e) {
                $ls->x = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->y = $hueLight->getXY()['y'];
            } catch (\Exception $e) {
                $ls->y = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->temperature = $hueLight->getColorTemp();
            } catch (\Exception $e) {
                $ls->temperature = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->alert = $hueLight->getAlert();
            } catch (\Exception $e) {
                $ls->alert = '';
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->colormode = $hueLight->getColorMode() ?? '';
            } catch (\Exception $e) {
                $ls->colormode = '';
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->mode = '';
            } catch (\Exception $e) {
                $ls->mode = '';
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            try {
                $ls->reachable = (int)$hueLight->isReachable();
            } catch (\Exception $e) {
                $ls->reachable = 0;
                $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
            }
            $ls->save();
        } catch (\Exception $e) {
            $errors[] = 'LightId: ' . $idLight . ' Message: ' . $e->getMessage();
        }
//        if (count($errors) > 0) {
//            dump($errors);
//        }
//        return $errors;
    }

}
