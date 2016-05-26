<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;

class ApiController extends Controller
{
    public function getUsers()
    {
    	$users = DB::table('users')->get();
    	json_encode($users);

    	return response()->json($users);
    }

    public function getQuestions()
    {
    	$questions = DB::table('questions')->get();
    	json_encode($questions);

    	return response()->json($questions);
    }

    public function getOpinionQuestions()
    {
        $opinionquestions = DB::table('opinion_questions')->get();
        json_encode($opinionquestions);

        return response()->json($opinionquestions);
    }


}
