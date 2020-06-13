<?php

namespace App\Http\Controllers;

use App\Survey;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SurveyController extends Controller
{
    public function index()
    {
        //
        $resources = Survey::latest()->get();
        return view('Admin.Survey.Index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $PageTitle='إنشاء استطلاع رأي جديد';
        return view('Admin.Survey.Create_survey',compact('PageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,
            [
                'title' => 'required',
                'target' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'groups' => 'required|array',
                'courses' => 'required|array',
                'departments' => 'required|array',



            ],[
                'title.required' => 'هذا الحقل مطلوب',
                'target.required' => 'هذا الحقل مطلوب',
                'start_date.required' => 'هذا الحقل مطلوب',
                'end_date.required' => 'هذا الحقل مطلوب',
                'groups.required' => 'هذا الحقل مطلوب',
                'courses.required' => 'هذا الحقل مطلوب',
                'departments.required' => 'هذا الحقل مطلوب',
            ]
        );

        $survey=new Survey();
        $survey->title=$request->title;
        $survey->target=$request->target;
        $survey->start_date=$request->start_date;
        $survey->end_date=$request->end_date;
        $survey->groups=serialize($request->groups);
        $survey->departments=serialize($request->departments);
        $survey->courses=serialize($request->courses);
        $survey->types=serialize($request->types);




        if ($survey->save()){

            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/surveys/'.$survey->id.'/edit');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = User::findOrFail($id);
        return view('users.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //   $model = User::findOrFail($id);
        //return view('users.edit', compact('model'));

        $PageTitle='تعديل استطلاع ';
        $survey=Survey::find($id);

        return view('Admin.Survey.Edit',compact('PageTitle','survey'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request,
            [
                'title' => 'required',
                'target' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'groups' => 'required|array',
                'courses' => 'required|array',
                'departments' => 'required|array',
                'types' => 'required|array',



            ],[
                'title.required' => 'هذا الحقل مطلوب',
                'target.required' => 'هذا الحقل مطلوب',
                'start_date.required' => 'هذا الحقل مطلوب',
                'end_date.required' => 'هذا الحقل مطلوب',
                'groups.required' => 'هذا الحقل مطلوب',
                'courses.required' => 'هذا الحقل مطلوب',
                'departments.required' => 'هذا الحقل مطلوب',
                'departments.types' => 'هذا الحقل مطلوب',
            ]
        );

        $survey=Survey::find($id);
        $survey->title=$request->title;
        $survey->target=$request->target;
        $survey->start_date=$request->start_date;
        $survey->end_date=$request->end_date;
        $survey->groups=serialize($request->groups);
        $survey->departments=serialize($request->departments);
        $survey->courses=serialize($request->courses);

        $survey->types=serialize($request->types);
        if ($survey->update()){

            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/surveys/'.$survey->id.'/edit');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */



    public function delete($id){
        $Survey=Survey::find($id);

        if ($Survey->delete()) {
            return response()->json($id);
        }else{
            return response()->json("false");

        }
    }
    public function result($id){
        $PageTitle='نتيجة استطلاع ';
        $survey=Survey::find($id);
        $hide_sid=true;

        return view('Admin.Survey.Index',compact('PageTitle','survey','hide_sid'));
    }

}
