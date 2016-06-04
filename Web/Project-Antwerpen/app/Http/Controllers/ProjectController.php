<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Milestone;
use App\Opinion_question;
use App\Comment;
use Auth;
use App\Http\Requests;
use Session;

class ProjectController extends Controller
{
    public function tijdlijn($id)
    {
        $project = Project::find($id);

        return view('pages.project-tijdlijn', compact('project'));
    }

    public function info($id)
    {
        $project = Project::find($id);
        $projectfases = Milestone::where('project_id', $id)->get();
 
 
        return view('pages.project-uitleg', compact('project', 'projectfases'));
    }
    public function kaart($id)
    {
        $project = Project::find($id);

        return view('pages.project-map', compact('project'));
    }
    public function meningen($id)
    {
        $user = Auth::user();
        $questions = Opinion_question::where('project_id', $id)->get();

        return view('pages.project-meningen', compact('questions', 'user' ));
    }
}
