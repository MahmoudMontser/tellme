<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        return view('Admin.Course.Index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:courses',
                'teacher_id' => 'required',
                'groups' => 'required|array',



            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'groups.required' => 'هذا الحقل مطلوب',
                'teacher_id.required' => 'هذا الحقل مطلوب',
                'name.unique' => 'هذه الفصل موجود من قبل',
            ]
        );
        $Course=new Course();
        $Course->name=$request->name;
        $Course->groups=serialize($request->groups);
        $Course->teacher_id=$request->teacher_id;
        if ($Course->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/courses');
        }

    }
    public function delete($id){
        $Course=Course::find($id);

        if ($Course->delete()) {
            return response()->json($id);
        }else{
            return response()->json("false");

        }
    }




    public function update(Request $request,$id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'teacher_id' => 'required',

            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'teacher_id.required' => 'هذا الحقل مطلوب',
                'name.unique' => 'هذه الفصل موجود من قبل',
            ]
        );
        $Course=Course::find($id);
        $Course->name=$request->name;
        $Course->groups=serialize($request->groups);
        $Course->teacher_id=$request->teacher_id;


        if ($Course->update()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/courses');
        }

    }
}
