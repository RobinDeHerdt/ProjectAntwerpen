<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class ApiController extends Controller
{
    public function getUsers()
    {
    	User::all()->toJson();

    	return view('pages.index')
    }
}
