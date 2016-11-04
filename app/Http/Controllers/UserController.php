<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function account(){
    	if(\Auth::guard('user')->check()){
        	return view('pages.account');        
        }
        if(\Auth::guard('guest')->check()){
            return view('pages.account');
        }
        return redirect()->route('login');
    }

    public function savesettings(){
    	return view('pages.account');
    }
    
}
