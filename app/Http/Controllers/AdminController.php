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
    	return view('admin.dashboard');
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
        $path_command = "cd E:/TNINE/OURCESU";
        $command = "git pull";
        echo exec($path_command, $temp); 
        echo exec($command, $output);
        //return view('admin.git',['output'=>$output]);
        //return response()->json(['output'=>$output]);
    }
}
