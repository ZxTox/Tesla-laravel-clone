<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    function showIndex() {
        return view('index');
    }

    function showCars() {
        return view('cars');
    }

    function showAuth() {
        return view('auth');
    }

    function showCar($car) {
        return view('car', ["car" => $car]);
    }
}