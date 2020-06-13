<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{


    public function store(Request $request,$id)
    {
        $this->validate($request,
            [
                'question' => 'required',
                'answer_type' => 'required',

            ],[
                'question.required' => 'هذا الحقل مطلوب',
                'answer_type.required' => 'هذا الحقل مطلوب',

            ]
        );
        $question=new Question();
        $question->question=$request->question;
        $question->answer_type=$request->answer_type;
        $question->survey_id=$id;
        if ($question->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/surveys/'.$id.'/edit');
        }

    }
    public function delete($id){
        $question=Question::find($id);

        if ($question->delete()) {
            return response()->json($id);
        }else{
            return response()->json("false");

        }
    }




    public function update(Request $request,$id)
    {
        $this->validate($request,
            [
                'question' => 'required',
                'answer_type' => 'required',

            ],[
                'question.required' => 'هذا الحقل مطلوب',
                'answer_type.required' => 'هذا الحقل مطلوب',

            ]
        );
        $question=Question::find($id);
        $question->question=$request->question;
        $question->answer_type=$request->answer_type;
        if ($question->update()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/surveys/'.$question->survey_id.'/edit');
        }

    }
}
