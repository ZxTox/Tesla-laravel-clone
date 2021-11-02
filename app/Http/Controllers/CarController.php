<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Carmodel;
use App\Models\Feature;
use App\Models\Offer;

class CarController extends Controller
{
    
    function getAllCars(Request $request) {
        $offers = Offer::join('users', 'offers.seller', '=', 'users.id')->select('offers.*', 'users.email', 'users.name', 'users.photoUrl')->get();

        return response()->json($offers, 200);
    }

    function showCar(Request $request, $car) {
        $carModel = Offer::where('offerid', $car)->join('users', 'offers.seller', '=', 'users.id')->select('offers.*', 'users.email', 'users.name', 'users.photoUrl')->first();
        $featuresIds = json_decode($carModel -> featureslist);
        $features = Feature::whereIn('id', $featuresIds)->get();

        return view('car', ["car" => $carModel, "features" => $features]);
    }
}
