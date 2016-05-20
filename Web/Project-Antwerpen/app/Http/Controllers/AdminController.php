<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\project;
use App\milestone;

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
		$project = project::find($id);
		$projectid = $project->id;

        $milestones = milestone::where('project_id', $projectid)->get();
        json_encode($milestones);

		return view('pages.editproject', compact('project', 'milestones'));
	}
  public function copyproject($id)
  {
    $project = project::find($id);
    $projectid = $project->id;

        $milestones = milestone::where('project_id', $projectid)->get();
        json_encode($milestones);

    return view('pages.copyproject', compact('project', 'milestones'));
  }
}
