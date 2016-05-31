<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\project;
use App\milestone;
use App\opinion_question;
use Session;
use App\comment;
use App\question;

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
        $milestones = json_encode($milestones);

    	return view('pages.copyproject', compact('project', 'milestones'));
  	}

  protected function store(Request $request)
    {
        $this->validate($request, [
            'project_name'      =>   'required',
            'project_info'      =>   'required',
            'project_thema'     =>   'required',
            'project_location'  =>   'required',
            'project_postalcode'=>   'required|integer|digits:4',
            'project_color'     =>   'required',
            'project_startdate' =>   'required|before:project_enddate',
            'project_enddate'   =>   'required',
            'headerimage'       =>   'required',
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

    protected function copy(Request $request, $id)
    {
        $projectToCopy = Project::find($id);
        $this->validate($request, [
            'project_name'      =>   'required',
            'project_info'      =>   'required',
            'project_thema'     =>   'required',
            'project_location'  =>   'required',
            'project_postalcode'=>   'required',
            'project_color'     =>   'required',
            'project_startdate' =>   'required|before:project_enddate',
            'project_enddate'   =>   'required',
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
                $project->headerimage   = $projectToCopy->headerimage;
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
            'project_startdate' =>   'required|before:project_enddate',
            'project_enddate'   =>   'required',
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

        Session::flash('projectedited', 'Het project is succesvol bewerkt.');

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

        $opinionquestions = opinion_question::where('project_id', $id)->get();

        for ($i = 0; $i < count($opinionquestions); $i++) {
            $opinionquestions[$i]->delete();
        }

        $project = Project::find($id);
        $project->delete();

        Session::flash('projectdeleted', 'Het project is succesvol verwijderd.');

        return redirect('/overzicht');
    }

    public function deletepage($id)
    {
        $project = Project::find($id);

        return view('pages.deleteproject', compact('project'));
    }

    public function createopinionquestion()
    {
        $projects = project::orderBy('id', 'asc')->get();
        $questions = opinion_question::orderBy('opinionquestion_id', 'asc')->get();

        return view('pages.createopinionquestion', compact('projects', 'questions'));
    }

    public function createquestion()
    {
        $questions = question::orderBy('question_id', 'asc')->get();

        return view('pages.createquestion', compact('questions'));
    }
    public function deleteopinionquestionpage()
    {
        $projects = project::orderBy('id', 'asc')->get();
        $questions = opinion_question::orderBy('opinionquestion_id', 'asc')->get();

        return view('pages.deleteopinionquestion', compact('projects', 'questions'));
    }

    public function deletequestionpage()
    {
        $questions = question::orderBy('question_id', 'asc')->get();

        return view('pages.deletequestion', compact('questions'));
    }

    public function deleteopinionquestion($id)
    {
      $opinionquestion = opinion_question::where('opinionquestion_id', $id)->first();

      $opinionquestion->delete();

      Session::flash('opinionquestiondeleted', 'De meningvraag succesvol verwijderd.');

      return back();
    }

    public function addopinionquestion(Request $request)
    {
        $this->validate($request, [
            'Project_names'             =>   'required',
            'opinionquestionbody'       =>   'required',
        ]);

        $selectedProject = $request->Project_names;
        $project = Project::find($selectedProject);

        $opinionquestion = new opinion_question;
        $opinionquestion->opinionquestionbody = $request->opinionquestionbody;
        $opinionquestion->project()->associate($project);
        $opinionquestion->save();

        Session::flash('opinionquestionadded', 'De meningvraag werd succesvol toegevoegd.');

        return back();
    }

    public function addquestion(Request $request)
    {
         $this->validate($request, [
            'questionbody'       =>   'required',
            'correctanswer'      =>   'required',
        ]);

        $question = new question;

        $question->questionbody = $request->questionbody;
        $question->correctanswer = $request->correctanswer;

        $question->save();

        Session::flash('questionadded', 'De vraag werd succesvol toegevoegd.');

        return back();
    }

    public function deletequestion($id)
    {
      $question = question::where('question_id', $id)->first();

      $question->delete();

      Session::flash('questiondeleted', 'De vraag succesvol verwijderd.');

      return back();
    }
}
