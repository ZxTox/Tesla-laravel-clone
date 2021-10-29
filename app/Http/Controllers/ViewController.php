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

    function showLogin() {
        return view('login');
    }
}