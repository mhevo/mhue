<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $rooms = Rooms::all();

        $params = [];
        foreach ($rooms as $room) {
            if ($room->id <= 0) {
                continue;
            }
            $lights = $room->lights()->get();
            $params[] = [
                'room' => $room,
                'lights' => $lights,
            ];
        }

        return view('start', ['params' => $params]);
    }
}
