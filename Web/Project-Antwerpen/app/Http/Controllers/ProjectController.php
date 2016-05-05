<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;

class ProjectController extends Controller
{
    protected function store(Request $request)
    {
        $this->validate($request, [
            'project_name'      =>   'required',
            'project_info'      =>   'required',
            'project_thema'     =>   'required',
            'project_location'  =>   'required',
            'project_postalcode'=>   'required',
            'project_color'     =>   'required',
        ]);

        $project = new project;

        $project->project_name  = $request->project_name;
        $project->info          = $request->project_info;
        $project->thema         = $request->project_thema;
        $project->location      = $request->project_location;
        $project->postalcode    = $request->project_postalcode;
        $project->color         = $request->project_color;
        $project->start_date    = $request->project_startdate;
        $project->end_date      = $request->project_enddate;

        $project->save();

        return redirect('/overview');
    }

    // public function show($id)
    // {   
    //     $project = Project::find($id);

    //     return view('pages.project-tijdlijn', compact($project));
    // }

    public function tijdlijn($id)
    {
        $project = Project::find($id);

        return view('pages.project-tijdlijn', compact('project'));
    }

    public function info()
    {
        return view('pages.project-uitleg');
    }
    public function kaart()
    {
        return view('pages.project-map');
    }
    public function stemmen()
    {
        return view('pages.project-stemmen');
    }
    public function reacties()
    {
        return view('pages.project-comments');
    }
}
