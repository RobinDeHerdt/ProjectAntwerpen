<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\project;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function newproject()
	{
		return view('pages.createproject');
	}

	public function editproject($id)
	{
		$project = Project::find($id);

		return view('pages.editproject', compact('project'));
	}
}
