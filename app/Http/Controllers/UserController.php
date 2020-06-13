<?php

namespace App\Http\Controllers;

use App\City;
use App\Governorate;
use App\Neighborhood;
use App\UserProperties;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resources = User::latest()->get();
        return view('Admin.User.Index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $PageTitle='إنشاء مستخدم جديد';
        return view('Admin.User.Create_user',compact('PageTitle'));
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
                'name' => 'required',
                'type' => 'required',
                'department_id' => 'required',
                'group_id' => 'required',
                'image'              => 'mimes:jpg,jpeg,png,gif,bmp',
                'phone' => 'required|regex:/[0-9]{10}/',
                'email' => 'required|unique:users',
                'password' => 'required|min:4|confirmed',
            ], [

                'phone.regex' => 'هذا الهاتف غير صالح',
                'name.required' => 'هذا الحقل مطلوب',
                'group_id.required' => 'هذا الحقل مطلوب',
                'department_id.required' => 'هذا الحقل مطلوب',
                'type.required' => 'هذا الحقل مطلوب',
                'image.mimes'        => ' يجب اختيار صورة اخرى لان امتداد الصورة غير صالح ',
                'phone.required' => 'هذا الحقل مطلوب',
                'email.required' => 'هذا الحقل مطلوب',
                'email.unique' => 'هذا الرقم موجود من قبل',
                'password.required' => 'هذا الحقل مطلوب',
                'password.confirmed' => 'كلمة المرور غير مطابقة',
                'password.min' => 'كلمة المرور لا تقل عن 4 أرقام',
            ]);

        $user=new User();
        $user->name=$request->name;
        $user->type=$request->type;
        $user->department_id=$request->department_id;
        $user->group_id=$request->group_id;
        $user->email=$request->email;
        $user->phone=$request->phone;

        $user['password'] = bcrypt($request->input('password'));

        if ($user->save()){

            if ($request->hasFile('image')) {
                $Img = md5($request['image']->getClientOriginalName()) . '.' . $request['image']->getClientOriginalExtension();
                $request['image']->move(base_path('storage/app/Images/User/Images/' . $user->id . '/'), $Img);
            }

            if (isset($Img)) {
               $user->image = $Img;
                $user->update();
            }
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/users');
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

        $PageTitle='تعديل مستخدم ';
        $Usr=User::find($id);
        return view('Admin.User.Edit',compact('PageTitle','Usr'));
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
                'name' => 'required',

                'phone' => 'required|regex:/[0-9]{10}/',

                'type' => 'required',
                'department_id' => 'required',
                'group_id' => 'required',

                'image' => 'mimes:jpg,jpeg,png,gif,bmp',
                'email' => 'required',
                'password' => 'nullable|min:4|confirmed',
            ], [



                'name.required' => 'هذا الحقل مطلوب',
                'department_id.required' => 'هذا الحقل مطلوب',
                'group_id.required' => 'هذا الحقل مطلوب',
                'type.required' => 'هذا الحقل مطلوب',
                'image.mimes'        => ' يجب اختيار صورة اخرى لان امتداد الصورة غير صالح ',

                'phone.required' => 'هذا الحقل مطلوب',
                'phone.regex' => 'هذا الهاتف غير صالح',
                'email.required' => 'هذا الحقل مطلوب',
                'email.unique' => 'هذا الرقم موجود من قبل',
                'password.confirmed' => 'كلمة المرور غير مطابقة',
                'password.min' => 'كلمة المرور لا تقل عن 4 أرقام',
            ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->type=$request->type;
        $user->department_id=$request->department_id;
        $user->group_id=$request->group_id;
        $user->phone=$request->phone;

        if ($request['password']){
        $user['password'] = bcrypt($request->input('password'));
        }


        if ($user->update()){

            if ($request->hasFile('image')) {
                $Img = md5($request['image']->getClientOriginalName()) . '.' . $request['image']->getClientOriginalExtension();
                $request['image']->move(base_path('storage/app/Images/User/Images/' . $user->id . '/'), $Img);
            }

            if (isset($Img)) {

                File::delete(base_path('storage/app/Images/User/Images/' . $user->id  ).'/'.$user->image);
                $user->image = $Img;
                $user->update();
            }
            $request->session()->put('PopSuccess', "تم حفظ المعلومات التي ادخلتها بنجاح");
            return redirect('/admin/users');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */



    public function delete($id){
        $User=User::find($id);

        if ($User->delete()) {
            File::delete(base_path('storage/app/Images/User/Images/' . $User->id  ).'/'.$User->image);
            return response()->json($id);
        }else{
            return response()->json("false");

        }
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('admin/login');
    }
}
