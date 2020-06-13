<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        return view('Admin.Department.Index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:departments',

            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'name.unique' => 'هذه الفصل موجود من قبل',
            ]
        );
        $Department=new Department();
        $Department->name=$request->name;
        if ($Department->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/departments');
        }

    }
    public function delete($id){
        $Department=Department::find($id);

        if ($Department->delete()) {
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
            ],[
                'name.required' => 'هذا الحقل مطلوب',
            ]
        );
        $Department=Department::find($id);
        $Department->name=$request->name;

        if ($Department->update()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/departments');
        }

    }
}
