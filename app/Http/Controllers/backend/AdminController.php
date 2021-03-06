<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function dologin(Request $request)
    {

        $userlogin=$request->except('_token');
        //dd($request->all());
        if(Auth::attempt($userlogin)){
            return view('admin.pages.dashboard.dashboard')->with('message','Login successful.');
        }
        else
        {
            return redirect()->back()->with('error','Invalid user credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
