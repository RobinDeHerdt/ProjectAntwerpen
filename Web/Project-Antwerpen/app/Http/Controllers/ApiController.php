<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Input;
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

    }

}
