<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\project;

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
		$projects = project::orderBy('id', 'asc')->get();


	return view('index' , [ 'projects' => $projects]  );
	}
	public function login()
	{
		return view('pages.login');
	}
	// public function uitleg()
	// {
	// 	return view('pages.project-uitleg');
	// }
	// public function map()
	// {
	// 	return view('pages.project-map');
	// }
	// public function stemmen()
	// {
	// 	return view('pages.project-stemmen');
	// }
	// public function tijdlijn()
	// {
	// 	return view('pages.project-tijdlijn');
	// }
	// public function comments()
	// {
	// 	return view('pages.project-comments');
	// }

}
