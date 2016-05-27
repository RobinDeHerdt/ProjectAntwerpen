<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\project;

class PageController extends Controller
{
	public function welcome()
	{
		return redirect('/overzicht');
	}

	public function about()
	{
		return view('pages.about');
	}

	public function overview()
	{
		$projects = project::orderBy('id', 'asc')->get();
		$user = null;
		
		if(Auth::user())
		{
			$user = Auth::user();
		}

		return view('index' , compact('projects', 'user'));
	}
	public function login()
	{
		return view('pages.login');
	}
}
