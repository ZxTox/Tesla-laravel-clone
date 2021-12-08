<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    function showIndex() {
        return view('index');
    }

    function showCars() {
        $carController = new CarController();

        return view('cars', ["cars" => $carController -> getAllCars()]);
    }

    function showAuth() {
        return view('auth');
    }
}