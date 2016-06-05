<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\milestone;
use App\opinion_question;
use App\comment;
use Auth;
use App\Http\Requests;
use Session;

class ProjectController extends Controller
{
    public function tijdlijn($id)
    {
        $project = project::find($id);

        return view('pages.project-tijdlijn', compact('project'));
    }

    public function info($id)
    {
        $project = project::find($id);
        $projectfases = milestone::where('project_id', $id)->get();
 
 
        return view('pages.project-uitleg', compact('project', 'projectfases'));
    }
    public function kaart($id)
    {
        $project = project::find($id);

        return view('pages.project-map', compact('project'));
    }
    public function meningen($id)
    {
        $user = Auth::user();
        $questions = opinion_question::where('project_id', $id)->get();

        return view('pages.project-meningen', compact('questions', 'user' ));
    }
}
