<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Guest;
use Session;
use App\User_Detail;

class UserController extends Controller
{
    public function account(){
    	if(\Auth::guard('user')->check()){
            $id=\Auth::guard('user')->user()->id;
            $user_type = 0;
            $cont_acc = User_Detail::where('user_id',$id)->get(['cont_acc']);
            $set_data = User::where('id',$id)->get();
            $data = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$cont_acc[0]->cont_acc)->get();

        	return view('pages.account',['cont_acc'=>$cont_acc,'data' =>$data[0],'user_type'=>$user_type,'set_data'=>$set_data[0]]);        
        }
        if(\Auth::guard('guest')->check()){
            $id = \Auth::guard('guest')->user()->id;
            $user_type = 1;
            $cont_acc = Guest::where('id',$id)->get(['cont_acc']);
            $data = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$cont_acc[0]->cont_acc)->get();
            return view('pages.account',['cont_acc'=>$cont_acc,'data' =>$data[0],'user_type'=>$user_type]);
        }
        return redirect()->route('login');
    }

    public function savesettings(Request $request){
        $this->validate($request, User::$settings_validation_rules);
        $data = $request->only('name','email','password1','password2','mobile');

    	return view('pages.account');
    }

    public function getuserdetails(Request $request){
        $cont_acc = $request->only('cont_acc');
        $header = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$cont_acc)->get();
        return response()->json(['header'=>$header[0]]);
    }
    public function setSession(Request $r)
    {
        if ($r->has('key')) {
            Session::put('masterkey',$r->key);
        }
        return redirect('/');
    }
}
