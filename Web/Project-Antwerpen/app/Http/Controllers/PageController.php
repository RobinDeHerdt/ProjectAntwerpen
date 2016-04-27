<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
	public function welcome()
	{
		return view('pages.welcome');
	}

	public function about()
	{
		return view('pages.about');
	}

	public function overview()
	{
		return view('index');
	}
	public function login()
	{
		return view('pages.login');
	}

}
