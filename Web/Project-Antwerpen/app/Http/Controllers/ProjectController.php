<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use Session;

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
            'headerimage'       =>   'required|unique:projects',   
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
        $project->xcoord        = $request->lat;
        $project->ycoord        = $request->lng;
            
        if ($request->hasFile('headerimage') && $request->file('headerimage')->isValid()) 
        {
            $file       = $request->file('headerimage');
            $fileName   = $file->getClientOriginalName();

            $file->move(base_path() . '/public/img/', $fileName);

            $project->headerimage   = '/img/' . $fileName;

            $project->save();
        }
        else 
        {
            abort('404', 'Sad times :(');
        }

        Session::flash('projectcreated', 'Je project is succesvol aangemaakt.');

        return redirect('/overview');
    }

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
    public function stemmen()
    {
        return view('pages.project-stemmen');
    }
    public function reacties()
    {
        return view('pages.project-comments');
    }
}
