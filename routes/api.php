<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Models\Offer;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "cars"], function() {
    Route::get("/", [CarController::class, 'getALlCarsData']);
});

Route::get('/users', [UserController::class, "getAllUsers"]);
Route::get('/mostoffers', [UserController::class, "usersWithMostCars"]);
Route::get('/sold', [CarController::class, "soldStats"]);