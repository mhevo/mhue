<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BridgeController;
use App\Http\Controllers\LightController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    [DashboardController::class, 'dashboard']
);

Route::get(
    '/pull/state/{lightId}',
    [DashboardController::class, 'pullstate']
);

Route::get(
    '/pull/states',
    [DashboardController::class, 'pullstates']
);

Route::post(
    '/switch/light',
    [DashboardController::class, 'switchlight']
);

Route::post(
    '/switch/room',
    [DashboardController::class, 'switchroom']
);

Route::post(
    '/room/set/color',
    [DashboardController::class, 'roomcolor']
);

Route::get('/configuration', function () {
    return view('config.configuration');
});

Route::get(
    '/configuration/bridges',
    [BridgeController::class, 'show']
);
Route::post(
    '/configuration/bridges/new',
    [BridgeController::class, 'new']
);
Route::get(
    '/configuration/bridges/import/{type}/{bridgeId}',
    [BridgeController::class, 'import']
);



Route::get(
    '/configuration/lights',
    [LightController::class, 'listLights']
);
Route::get(
    '/configuration/lights/edit/{lightId}',
    [LightController::class, 'showLight']
);
Route::post(
    '/configuration/lights/edit/{lightId}',
    [LightController::class, 'editLight']
);
Route::get(
    '/configuration/lights/delete/{lightId}',
    [LightController::class, 'deleteLight']
);

Route::get(
    '/configuration/rooms',
    [RoomController::class, 'listRooms']
);
Route::get(
    '/configuration/rooms/edit/{roomId}',
    [RoomController::class, 'showRoom']
);
Route::post(
    '/configuration/rooms/edit/{roomId}',
    [RoomController::class, 'editRoom']
);
Route::get(
    '/configuration/rooms/delete/{roomId}',
    [RoomController::class, 'deleteRoom']
);
Route::post(
    '/configuration/rooms/addlights',
    [RoomController::class, 'addLightsToRoom']
);
Route::post(
    '/configuration/rooms/removelight',
    [RoomController::class, 'removeLightFromRoom']
);
