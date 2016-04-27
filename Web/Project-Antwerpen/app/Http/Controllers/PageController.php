<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
	public function welcome()
	{
		return view('welcome');
	}

	public function about()
	{
		return view('pages.about');
	}

	public function home()
	{
		return view('index');
	}
	public function register()
	{
		return view('pages.register');
	}

}
