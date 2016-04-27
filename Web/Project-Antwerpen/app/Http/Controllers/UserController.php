<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function store(Request $request)
    {
    	$user = new User;

    	$user->firstname 	         = $request->first_name;
    	$user->lastname 	         = $request->last_name;
    	$user->age 			         = $request->age;
    	$user->postalcode 	         = $request->postalcode;
    	$user->password 	         = bcrypt($request->password);
    	$user->email 		         = $request->email;
        $user->gender_1male_2female  = $request->gender;
    	$user->save();

        return redirect('/home');
    }
}
