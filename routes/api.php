<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('individus', App\Http\Controllers\API\IndividuAPIController::class);

Route::resource('dokumens', App\Http\Controllers\API\DokumenAPIController::class);

Route::resource('keluargas', App\Http\Controllers\API\KeluargaAPIController::class);