<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    
    function getAllCars(Request $request) {
        $cars = Car::join('carmodels', 'cars.model', '=', 'carmodels.id')->join('users', 'cars.seller', '=', 'users.id')
        ->select('cars.car', 'cars.price', 'cars.mileage', 'cars.description', 'carmodels.name as modelName', 'carmodels.description', 'carmodels.mileage', 'carmodels.hp', 'carmodels.hp',
        'carmodels.range', 'carmodels.topspeed', 'carmodels.year', 'carmodels.acceleration')
        ->get();
        return response()->json($cars, 200);
    } 
}
