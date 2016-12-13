<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;

class AdminController extends Controller
{
    public function login(){
        if(\Auth::guard('admin')->check()){
            return view('admin.dashboard');    
        }
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
        if(\Auth::guard('admin')->check()){
            return view('admin.dashboard');    
        }
        return redirect('/admin/login');
    	
    }

    public function git(){
        $output = '';
        if(\Auth::guard('admin')->check()){
            return view('admin.git',['output',$output]);    
        }
        return view('admin.login');
        
    }

    public function gitupdate(Request $request){
        $data = $request->only('giturl');
        if(empty($data['giturl'])){
            return back()->withInput()->withErrors(['giturl' => 'URL Required']);
        }
        $path_command = "cd E:/TNINE/OURCESU 2>&1";
        $command = "git pull 2>&1";
        exec($path_command,$temp); 
        exec($command,$output);
        $str_output = implode(';', $temp);
        $str_output = $str_output."<br>".implode(';', $output);
        return view('admin.git',['output'=>$output]);
        //return response()->json(['output'=>$output]);
    }

    public function logout(){
        if(\Auth::guard('admin')->check()){
            \Auth::guard('admin')->logout();
        }
        return redirect()->route('adminlogin');
    }

    public function pages(){
        if(\Auth::guard('admin')->check()){
            return view('admin.pages');    
        }
        return redirect('/admin/login');
        
    }

    public function settings(){
        if(\Auth::guard('admin')->check()){
            return view('admin.settings');    
        }
        return redirect('/admin/login');
        
    }

    public function images(){
        if(\Auth::guard('admin')->check()){
            return view('admin.images');    
        }
        return redirect('/admin/login');
        
    }
}
