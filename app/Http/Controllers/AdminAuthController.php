<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view('Admin.Login');
    }
    public function postlogin(){

        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            if (Auth::user()->type=='Admin') {
                return redirect('admin');
            }else{
                return redirect('/');
            }
        }else{
            Session::flash('error-l', 'بيانات المستخدم غير صحيحة');
            return redirect('admin/login');
        }
    }
}
