<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function login(){
        return view('admin.login');
    }

    public function check_admin_login(Request $request)
    {
        $this->validate($request ,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    
        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' =>$request->password], $request->get('remember'))) {
            
            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }


}
