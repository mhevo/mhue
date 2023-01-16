<?php

namespace App\Http\Controllers;

use App\Models\Lights;
use Illuminate\Http\Request;

class LightController extends Controller
{
    public function listLights()
    {
        $lights = Lights::all()->sortBy('label');

        $params = ['lights' => $lights];
        return view('config.lights', $params);
    }

    public function showLight($lightId)
    {
        $light = Lights::where('id', (int) $lightId)->first();
        $params = ['light' => $light];
        return view('config.lightedit', $params);
    }
}
