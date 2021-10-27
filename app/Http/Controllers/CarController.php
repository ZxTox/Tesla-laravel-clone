<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Carmodel;

class CarController extends Controller
{
    
    function getCars() {
        $cars = Carmodel::all();
        return view("test", ["cars" => $cars]);
    } 
}
