<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class UserController extends Controller
{
    public function show()
	{
		$user = Auth::user();

		return view('pages.user', compact('user'));
	}

	public function edit()
	{
		$user = Auth::user();

		return view('pages.edituser', compact('user'));
	}

	public function update(Request $request)
	{
		$user = Auth::user();
		
		$this->validate($request, [
            'firstname'      	=>   'required|max:255',
            'lastname'      	=>   'required|max:255',
            'email'     		=>   'required|email|max:255|unique:users,email,'.$user->id,
            'postalcode'  		=>   'integer',
            'age'				=>   'integer',
           	'profileimage'		=>   'image',
        ]);
		
		

		if (Input::hasFile('profileimage') && Input::file('profileimage')->isValid()) {
	        $destinationPath = '/public/img';
	        $extension = Input::file('profileimage')->getClientOriginalExtension();
	        $fileName = '/img/' . uniqid().'.'.$extension;

	        Input::file('profileimage')->move(base_path() . $destinationPath, $fileName);

	        $user->profileimage = $fileName;
        }  

		$user->firstname 	= $request->firstname;
		$user->lastname 	= $request->lastname;
		$user->email 		= $request->email;
		$user->age 			= $request->age;
		$user->postalcode 	= $request->postalcode;
		$user->gender_1male_2female = $request->gender;

		

		$user->save();

		return redirect('/profiel');
	}
}
