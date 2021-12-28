<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //

    function showLoginForm(){
        return view('admin.auth.login');
    }

    function login(Request $request){
       if (Auth::guard('admin')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'is_active'=>1
        ])){
            return redirect()->route('admin.tuition.list');
        }
        else{
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
