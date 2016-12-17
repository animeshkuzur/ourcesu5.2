<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

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
        //$this->validate($request, User::$login_validation_rules);
        $data = $request->only('email','password');
        $password = 'password';
        if(empty($data['password'])){
            if(\Auth::guard('guest')->attempt(['email' => $data['email'], 'password' => $password])){
                return redirect('/');   
            }
            else{
                return back()->withInput()->withErrors(['email' => 'Username or password is invalid']);
            }
        }
        elseif (\Auth::guard('user')->attempt($data)){
            return redirect('/');
        }
        else{
            return back()->withInput()->withErrors(['email' => 'Username or password is invalid']);
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

    public function registervalidate(Request $request){
        $count = 0;
        $this->validate($request, User::$register_validation_rules);
        $contacc = $request->get('cont_acc');
        $data = $request->only('name','email','password','password2','cont_acc','phone');
        $stl_conn = \DB::connection('sqlsrv_STL');
        foreach ($contacc as $accnos) {
            $count=$count+1;
            if(empty($accnos)){
                return back()->withInput()->withErrors(['cont_acc' => 'Contract Account Number ' .$count. ' is missing']);
            }
            else{
                $USER_DATA = $stl_conn->table('BILLING_OUTPUT_2016')->where('CONTRACT_ACC', $accnos)->limit(1)->get();
                if(empty($USER_DATA)){
                    return back()->withInput()->withErrors(['cont_acc' => 'Contract Account Number '.$count.' does not exist']);
                }
            }
        }
        if($data['password']!=$data['password2']){
            return back()->withInput()->withErrors(['password' => 'Confirmation password did not match']);
        }
        if($count>1){
            $temp = $contacc[0];
        }
        else{
            $temp = $contacc;
        }
        $user = \DB::table('users')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'cont_acc' => $temp,
                'phone' => $data['phone'],
            ]);
        $user_id = User::where('email',$data['email'])->get();
            $u_id = $user_id[0]->id;
            foreach ($contacc as $accno) {
                $U_DATA = $stl_conn->table('BILLING_OUTPUT_2016')->where('CONTRACT_ACC', $accno)->limit(1)->get();
                foreach ($U_DATA as $DAT) {
                    $user_details = \DB::table('user_details')->insert([
                    'cont_acc' => $DAT->CONTRACT_ACC,
                    'cons_acc' => $DAT->CONS_ACC,
                    'user_id' => $u_id,
                    ]);
                }                        
            }
        if($user_details){
           if(\Auth::guard('user')->attempt(['email' => $data['email'], 'password' => $data['password'] ])){
                return redirect('/');
            } 
        }
        else{
            return redirect()->withInput()->withErrors(['email' => 'Cannot register, Internal Server Error']);
        }
        
        return redirect()->route('login');
    }
}
