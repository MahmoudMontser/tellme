<?php

namespace App\Http\Controllers;

use App\Group;
use App\Sample;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        return view('Admin.Group.Index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:groups',
                'department_id' => 'required',

            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'department_id.required' => 'هذا الحقل مطلوب',
                'name.unique' => 'هذه الفصل موجود من قبل',
            ]
        );
        $Group=new Group();
        $Group->name=$request->name;
        $Group->department_id=$request->department_id;
        if ($Group->save()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/groups');
        }

    }
    public function delete($id){
        $Group=Group::find($id);

        if ($Group->delete()) {
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
                'department_id' => 'required',
            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'department_id.required' => 'هذا الحقل مطلوب',

            ]
        );
        $Group=Group::find($id);
        $Group->name=$request->name;
        $Group->department_id=$request->department_id;


        if ($Group->update()){
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/groups');
        }

    }


}
