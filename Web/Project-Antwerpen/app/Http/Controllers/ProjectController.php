<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\milestone;
use App\comment;
use App\rating;
use App\Http\Requests;
use Session;

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
    public function meningen()
    {
        return view('pages.project-meningen');
    }
}
