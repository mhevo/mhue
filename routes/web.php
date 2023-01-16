<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BridgeController;
use App\Http\Controllers\LightController;

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

Route::get('/', function () {
    return view('start');
});

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
