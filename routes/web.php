<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
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
    Route::get('/', [ViewController::class, "showCars"]);
    Route::get('/{id}', [CarController::class, "showCar"]);
});


Route::get('/auth', [ViewController::class, "showAuth"])->name("auth"); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
