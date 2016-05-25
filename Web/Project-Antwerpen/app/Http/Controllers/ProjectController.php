<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\milestone;
use App\opinion_question;
use App\comment;
use App\rating;
use App\Http\Requests;
use Session;
// use DB;


class ProjectController extends Controller
{
    public function tijdlijn($id)
    {
        $project = Project::find($id);

        return view('pages.project-tijdlijn', compact('project'));
    }

    public function info()
    {
        return view('pages.project-uitleg');
    }
    public function kaart($id)
    {
        $project = Project::find($id);

        return view('pages.project-map', compact('project'));
    }
    public function meningen($id)
    {
        // $questions = DB::table('projects')->join('opinion_questions', 'projects.id' , '=', 'opinion_questions.project_id')->where('projects.id', '=', $id)->select('opinionquestionbody', 'up_vote', 'down_vote')->get();
        $questions = opinion_question::where('project_id', $id)->get();
        //json_encode($questions);

        return view('pages.project-meningen', compact('questions'));
    }
}
