<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Project;
use App\User;
use Auth;
use Session;

class CommentController extends Controller
{
    protected function store(Request $request, $id)
    {
        $this->validate($request, [
            'reactie'      =>   'required|max:1000',
            'rating'       =>   'required',
        ]);

        $comment = new Comment;
        $project = Project::find($id);
        $user 	 = Auth::user();


        $comment->comment_body  = $request->reactie;
        $comment->rating        = $request->rating;
        $comment->Project()->associate($project);
        $comment->User()->associate($user);
        $comment->save();

        Session::flash('commented', 'Bedankt voor je reactie!');

        return back();
    }

    public function reacties($id)
    {
        $project = Project::find($id);
        $comments = Comment::all();

        $loggedInUser = Auth::user();

        return view('pages.project-reacties', compact('project', 'comments', 'loggedInUser'));
    }

    public function delete($id, $commentid)
    {
    	$comment = Comment::find($commentid);
		$comment->delete();

		Session::flash('commentdeleted', 'De reactie werd succesvol verwijderd.');

		return back();
    }
}
