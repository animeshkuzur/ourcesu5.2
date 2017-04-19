<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Guest;
use App\User_Detail;

class PaymentController extends Controller
{
	public function payment(){
		if(\Auth::guard('user')->check()){
            $id=\Auth::guard('user')->user()->id;
            $cont_acc = User_Detail::where('user_id',$id)->get(['cont_acc']);
            $set_data = User::where('id',$id)->get();
            $data = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$cont_acc[0]->cont_acc)->get();

        	return view('pages.payment',['cont_acc'=>$cont_acc,'data' =>$data[0],'set_data'=>$set_data[0]]);        
        }
        if(\Auth::guard('guest')->check()){
            $id = \Auth::guard('guest')->user()->id;
            $cont_acc = Guest::where('id',$id)->get(['cont_acc']);
            $data = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$cont_acc[0]->cont_acc)->get();
            return view('pages.payment',['cont_acc'=>$cont_acc,'data' =>$data[0]]);
        }
        return view('pages.payment');
	}

    public function initiate(){
    	

    	return view('pages.payment');
    }

    public function receipt(Request $request){
    	$data = $request->all();
    	return $data;
    }
}
