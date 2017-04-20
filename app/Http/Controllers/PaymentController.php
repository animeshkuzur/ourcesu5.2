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

    public function getbilldate(Request $request){
        $date = array();
        $flag = 1;
        $data = $request->only('cont_acc');
        if(!$data['cont_acc']){
            return response()->json(['error' => 'cont_acc parameter absent']);
        }
        $sap_bill = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$data['cont_acc'])->orderby('BILL_MONTH','DESC')->get(['BILL_MONTH']);
                if($sap_bill){
                    foreach ($sap_bill as $dat) {
                        array_push($date,$dat->BILL_MONTH);
                        if($flag){
                            $temp_date = $dat->BILL_MONTH;
                            $flag = 0;
                        }
                    }
                }
        $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$data['cont_acc'])->where('BillMonth',$temp_date)->limit(1)->get();
        return response()->json(['dates' => $date,'spot_bill' => $spot_bill]);
    }

    public function getbill(Request $request){
        $date = array();
        $data = $request->only('cont_acc','date');
        if(!$data['cont_acc']){
            return response()->json(['error' => 'cont_acc parameter absent']);
        }
        if(!$data['date']){
            return response()->json(['error' => 'bill month parameter absent']);   
        }
        $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$data['cont_acc'])->where('BillMonth',$data['date'])->limit(1)->get();
        if(!$spot_bill){
            return response()->json(['error' => 'no records found!']);    
        }
        return response()->json(['spot_bill' => $spot_bill]);
        
    }
}
