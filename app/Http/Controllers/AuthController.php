<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function login(){
        if(\Auth::guard('user')->check()){
            return redirect()->route('account');    
        }
        if(\Auth::guard('guest')->check()){
            return redirect()->route('account');
        }
        return view('pages.login');
    }

    public function loginvalidate(Request $request){
        $data = $request->only('email','password');
        $password = 'password';
        if(empty($data['password'])){
            if(\Auth::guard('guest')->attempt(['email' => $data['email'], 'password' => $password])){
                return redirect('/');   
            }
        }
        elseif (\Auth::guard('user')->attempt($data)){
            return redirect('/');
        }

    }

    public function forgot(){
        
    }

    public function register(){
        if(\Auth::guard('user')->check()){
            return redirect()->route('account');    
        }
        if(\Auth::guard('guest')->check()){
            return redirect()->route('account');
        }
        return view('pages.register');
    }

    public function logout(){
        if(\Auth::guard('user')->check()){
            \Auth::guard('user')->logout();    
        }
        if(\Auth::guard('guest')->check()){
            \Auth::guard('guest')->logout();
        }
        return redirect()->route('login');
    }

    public function registervalidate(){
        return redirect()->route('login');
    }
}
