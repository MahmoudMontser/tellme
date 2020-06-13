<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class VoteController extends Controller
{

    public function index()
    {
        return view('Admin.Vote.Index');
    }


    public function createVote($id)
    {

        $PageTitle='ادلاء استبيان جديد';
        $survey=Survey::find($id);
        return view('Admin.Vote.Create_vote',compact('PageTitle','survey'));
    }
    public function createVotePost(Request $request,$id){


        foreach ($request->vote as $key => $value){

            $vote= new Vote();
            $vote->vote=$value;
            $vote->question_id=$key;
            $vote->survey_id=$id;
            $vote->user_id=Auth::id();
            $vote->save();



        }
        $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");

        return redirect('/');
    }

}
