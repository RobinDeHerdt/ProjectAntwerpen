<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
		return view('pages.edituser', compact('user'));
	}
}
