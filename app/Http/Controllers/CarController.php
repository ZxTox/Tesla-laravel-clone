<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Carmodel;

class CarController extends Controller
{
    
    function getAllCars(Request $request) {
        $cars = Car::join('carmodels', 'cars.model', '=', 'carmodels.id')->join('users', 'cars.seller', '=', 'users.id')
        ->select('cars.car', 'cars.price', 'cars.mileage', 'cars.description', 'carmodels.name as modelName', 'carmodels.description', 'carmodels.mileage', 'carmodels.hp', 'carmodels.hp',
        'carmodels.range', 'carmodels.topspeed', 'carmodels.year', 'carmodels.acceleration')
        ->get();
        return response()->json($cars, 200);
    } 

    function showCar(Request $request, $car) {
        $view_controller = new ViewController;
        $car = Carmodel::find($car);
        
        return $view_controller->showCar($car);
    }
}
