<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

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

Route::get('/', [ViewController::class, "showIndex"])->name("index");

Route::group(["prefix" => "cars"], function() {
    Route::get('/', [ViewController::class, "showCars"])->name("cars");
    Route::get('/{id}', [CarController::class, "showCar"])->name("car");
});

Route::group(["prefix" => "me"], function() {
    Route::get('/', [UserController::class, "showMe"])->middleware("auth")->middleware("auth")->name("me");
    Route::post('/', [UserController::class, "updateMe"])->middleware("auth")->middleware("auth")->name("updateMe");
});

Route::post('/uploadMe', [UserController::class, "uploadMe"])->name("uploadMe");

Route::get('/auth', [ViewController::class, "showAuth"])->middleware("guest")->name("auth"); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
