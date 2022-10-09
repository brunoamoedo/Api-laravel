<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bands',[BandsController::class,'getAll']);

Route::get('/bands/{id}',[BandsController::class,'getBandsId']);
Route::post('/bands/store',[BandsController::class,'store']);
Route::get('/bands/mostra/gender/',[BandsController::class,'MostraBandaGender']);
Route::get('/bands/gender/{gender}',[BandsController::class,'getBandsGender']);
