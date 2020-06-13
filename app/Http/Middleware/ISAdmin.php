<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ISAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if (Auth::user()->type != "Admin") {
                Auth::logout();
                $request->session()->put('PopSuccess', "ليس من صلاحياتك الدخول لتلك الصفحة");
                return redirect('admin/login');
            }
        }else{
            return redirect('admin/login');
        }
        return $next($request);
    }
}
