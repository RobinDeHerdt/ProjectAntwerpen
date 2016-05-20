<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\milestone;
use App\comment;
use App\rating;
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
            'project_startdate' =>   'required',
            'project_enddate'   =>   'required',
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
        }
        else 
        {
            abort('404', 'Sad times :(');
        }

        $project->save();
        
        $jsonArray = json_decode($request->milestone_json, true);
        
        for ($i = 0; $i < count($jsonArray); $i++) { 
            $milestone = new milestone;

            $milestone->milestone_title = $jsonArray[$i]['title'];
            $milestone->milestone_info  = $jsonArray[$i]['info'];
            $milestone->milestone_image = $jsonArray[$i]['icon'];
            $milestone->start_date      = $jsonArray[$i]['startdate'];
            $milestone->end_date        = $jsonArray[$i]['enddate'];
            $milestone->project()->associate($project);
            $milestone->save();
        }

        Session::flash('projectcreated', 'Je project is succesvol aangemaakt.');

        return redirect('/overzicht');
    }

    protected function update(Request $request, $id)
    {
        $this->validate($request, [
            'project_name'      =>   'required',
            'project_info'      =>   'required',
            'project_thema'     =>   'required',
            'project_location'  =>   'required',
            'project_postalcode'=>   'required',
            'project_color'     =>   'required',   
        ]);

        $project = project::find($id);

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
        }      
        
        $project->save();  

        $milestones = milestone::where('project_id', $id)->get();
        
        for ($i = 0; $i < count($milestones); $i++) { 
            $milestones[$i]->delete();
        }

        $jsonArray = json_decode($request->milestone_json, true);
        
        for ($i = 0; $i < count($jsonArray); $i++) { 
            $milestone = new milestone;

            $milestone->milestone_title = $jsonArray[$i]['title'];
            $milestone->milestone_info  = $jsonArray[$i]['info'];
            $milestone->milestone_image = $jsonArray[$i]['icon'];
            $milestone->start_date      = $jsonArray[$i]['startdate'];
            $milestone->end_date        = $jsonArray[$i]['enddate'];
            $milestone->project()->associate($project);
            $milestone->save();
        }

        Session::flash('projectedited', 'Je project is succesvol bewerkt.');

        return redirect('/overzicht');
    }

    public function deleteproject($id)
    {
        $milestones = milestone::where('project_id', $id)->get();
        
        for ($i = 0; $i < count($milestones); $i++) { 
            $milestones[$i]->delete();
        }

        $comments = comment::where('project_id', $id)->get();
        
        for ($i = 0; $i < count($comments); $i++) { 
            $comments[$i]->delete();
        }

        $ratings = rating::where('project_id', $id)->get();
        
        for ($i = 0; $i < count($ratings); $i++) { 
            $ratings[$i]->delete();
        }

        $project = Project::find($id);
        $project->delete();

        return redirect('/overzicht');
    }

    public function deletepage($id)
    {
        $project = Project::find($id);

        return view('pages.deleteproject', compact('project'));
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
    public function meningen()
    {
        return view('pages.project-meningen');
    }
}
