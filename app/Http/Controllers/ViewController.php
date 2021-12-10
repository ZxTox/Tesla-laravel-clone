<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    function showIndex() {
        return view('index');
    }

    function showCars(Request $request) {
        $carController = new CarController();

        return view('cars', ["cars" => $carController -> getAllCars($request)]);
    }

    function showAdmin() {
        return view("admin");
    }

    function showAuth() {
        return view('auth');
    }
}