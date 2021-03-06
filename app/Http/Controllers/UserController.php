<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UserController extends Controller
{
    function showMe() {
        return view("me");
    }

    function updateMe(Request $request) {
        $validated = $this -> performValidation($request);
        $user = $this -> saveUser($validated);

        return redirect()->back()->with("message", "Profile successfully updated!");
        //return view("me", ["message" => "Profile successfully updated!"]);
    }

    function saveLocationUser(Request $request) {
        $user = User::find(Auth::user() -> id);

        $user -> location = $request->input('coords');
        $user -> save();

        return redirect()->back()->with("message", "Location successfully updated!");
    }

    function removeLocation(Request $request) {
        $user = User::find(Auth::user() -> id);

        $user -> location = NULL;
        $user -> save();

        return redirect()->back()->with("message", "Location was successfully removed!");
    }

    function getAllUsers(Request $request) {
        $users = User::all();

        return response()->json($users);
    }

    function usersWithMostCars(Request $request) {
        $users = Offer::select('users.name',Offer::raw('count(*) as amountOfCars'))->join('users','offers.seller','=','users.id')->groupBy('users.name')->get();
        return response()->json($users);
    }

    function saveUser($data) {
        $user = User::find(Auth::user() -> id);

        $user -> name = $data["name"];
        $user -> email = $data["email"];

        $user -> save();

        return $user;
    }


    function performValidation(Request $request) {
        $rules = [
            "name" => "string|required|min:3|max:255",
            "email" => "email|required|min:5|max:255",
        ];

        return $request -> validate($rules);
    }

    function uploadMe(Request $request) {
        $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
        $user = User::find(Auth::user() -> id);
        $user -> photoUrl = $uploadedFileUrl;
        $user -> save();

        return back();
    }

}
