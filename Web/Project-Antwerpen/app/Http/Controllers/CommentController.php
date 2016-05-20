<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\comment;
use App\project;
use App\User;
use Auth;
use Session;

class CommentController extends Controller
{
    protected function store(Request $request, $id)
    {
        $this->validate($request, [
            'reactie'      =>   'required',
        ]);

        $comment = new comment;
        $project = Project::find($id);
        $user 	 = Auth::user();


        $comment->comment_body  = $request->reactie;
        $comment->project()->associate($project);
        $comment->user()->associate($user);
        $comment->save();
        
        Session::flash('commented', 'Bedankt voor je reactie!');

        return back();
    }

    public function reacties($id)
    {
        $project = Project::find($id);
        $comments = Comment::all();

        return view('pages.project-reacties', compact('project', 'comments'));
    }

    public function delete($id, $commentid)
    {
    	$comment = comment::find($commentid);
		$comment->delete();

		Session::flash('commentdeleted', 'De reactie werd succesvol verwijderd.');

		return back();
    }
}
