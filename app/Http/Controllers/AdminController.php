<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use App\Category;
use App\Subcategory;
use App\Page;
use App\Content;

class AdminController extends Controller
{
    public function login(){
        if(\Auth::guard('admin')->check()){
            return redirect('/admin/dashboard');   
        }
    	return view('admin.login');
    }

    public function adminvalidate(Request $request){
        $this->validate($request, Admin::$login_validation);
    	$data = $request->only('email','password');
    	if(\Auth::guard('admin')->attempt($data)){
            return redirect('/admin/dashboard');   
        }
        else
            return back()->withInput()->withErrors(['email' => 'Username or password is invalid']);
    }

    public function dashboard(){
        if(\Auth::guard('admin')->check()){
            $users = Admin::get();
            return view('admin.dashboard',['users'=>$users]);    
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
            $category = Category::get();
            return view('admin.pages',['category'=>$category]);    
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

    public function adminchangepwd(Request $request){
        if(!\Auth::guard('admin')->check()){
           return redirect('/admin/login'); 
        }
        $this->validate($request, Admin::$change_password_validation);
        $data = $request->only('cur_password','new_password');
        $id = \Auth::guard('admin')->user()->id;
        $pass = Admin::where('id',$id)->first();
        if(!\Hash::check($data['cur_password'],$pass->password)){
            return back()->withInput()->withErrors(['password' => 'Wrong password']);
        }
        $temp = Admin::where('id',$id)->update(['password'=>bcrypt($data['new_password'])]);
        if(empty($temp)){
            return back()->withInput()->withErrors(['password' => 'Cannot change password']);
        }
        $request->session()->flash('alert-success', 'Password change successful!');
        return redirect('/admin/settings');   
    }

    public function adduser(Request $request){
        if(!\Auth::guard('admin')->check()){
           return redirect('/admin/login'); 
        }
        $this->validate($request, Admin::$add_user_validation);
        $data = $request->only('email','password');
        $temp = Admin::insert([
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),     
        ]);
        if(empty($temp)){
            return back()->withInput()->withErrors(['user_email' => 'Cannot add new user']);
        }

        $request->session()->flash('alert-success', 'User was successfully added!');
        return redirect('/admin/settings');
    }

    public function getsubcat(Request $request){
        $id = $request->only('id');
        $data = Subcategory::where('category_id',$id)->get();
        return response()->json(['data'=>$data]);
    }

    public function getpage(Request $request){
        $id = $request->only('id');
        $data = Page::where('subcategory_id',$id)->get();
        return response()->json(['data'=>$data]);
    }

    public function getcontent(Request $request){
        $id = $request->only('cat','subcat','pag');
        $data = Content::where('page_id',$id['pag'])->get();
        return response()->json(['data'=>$data]);
    }

    public function savecontent(Request $request){
        $id = $request->only('cat','subcat','pag','content');
        $data = Content::where('page_id',$id['pag'])->update(['content'=>"`".$id['content']."`"]);
        if(!$data){
            return response()->json(['error'=>'Cannot save data']);
        }
        return response()->json(['success'=>'Page Saved!']);
    }
}
