<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use App\opinion_question;
use Illuminate\Support\Facades\Input;
use File;

class ApiController extends Controller
{
    public function getUsers()
    {
    	$users = DB::table('users')->get();

    	return response()->json($users);
    }

    public function getQuestions(Request $request)
    {
    	$questions = DB::table('questions')->get();

    	return response()->json($questions)->setCallback($request->input("callback"));
    }

    public function getOpinionQuestions(Request $request)
    {
        $opinionquestions = DB::table('opinion_questions')->get();

        return response()->json($opinionquestions)->setCallback($request->input("callback"));
    }

    public function postVote()
    {
        $data = Input::all();
        
        $opinionquestion    = opinion_question::find($data['question_id']);
        $upvotes            = $opinionquestion->up_vote;
        $downvotes          = $opinionquestion->down_vote;

        if($data['vote'] == 'upvote')
        {
            $upvotes++;
            $opinionquestion->up_vote = $upvotes;
        }
        else
        {
            $downvotes++;
            $opinionquestion->down_vote = $downvotes;
        }

        $opinionquestion->save();
    }
}
