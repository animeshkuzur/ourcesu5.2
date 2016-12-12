<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;

class AdminController extends Controller
{
    public function login(){
    	return view('admin.login');
    }

    public function adminvalidate(Request $request){
    	$data = $request->only('email','password');
    	if(\Auth::guard('admin')->attempt($data)){
            return redirect('/admin/dashboard');   
        }
        else
            return back()->withInput()->withErrors(['email' => 'Username or password is invalid']);
    }

    public function dashboard(){
    	
    }
}
