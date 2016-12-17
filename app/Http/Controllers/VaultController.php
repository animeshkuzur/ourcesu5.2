<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User_Detail;

class VaultController extends Controller
{
    public function index(){
    	//return date('m-Y');
    	$cont_accs = array();
    	if(\Auth::guard('user')->check()){
    		$id=\Auth::guard('user')->user()->id;
    		$cont_acc = User_Detail::where('user_id',$id)->get();
	    	foreach($cont_acc as $cont){
	    		$cont_accs[$cont->cont_acc] = $cont->cont_acc;
	    	}
    	}
    	if(\Auth::guard('guest')->check()){
    		$cont_accs[\Auth::guard('guest')->user()->cont_acc] = \Auth::guard('guest')->user()->cont_acc;
    	}
  		return view('pages.vault',['cont_acc'=>$cont_accs]);
    }

    public function getdocuments(Request $request){
    	$result=array();
    	$document = array();
    	$data = $request->only('cont_acc','date');
    	$arydate = explode("-",$data['date']);
    	$date = $arydate[1].$arydate[0];
    	$stl_conn = \DB::connection('sqlsrv_STL');
    	$sap_conn = \DB::connection('sqlsrv_SAP');
        $spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where('CONTRACT_ACC', $data['cont_acc'])->where('BillMonth',$date)->limit(1)->get();
        if($spot_bill){
        	$document['name'] = "Spot Bill";
        	$document['date'] = $data['date'];
        	$document['type'] = "Bill";
        	$result[0] = $document;
        }

        $result[1]=$document;
        return response()->json(['data' => $result]);

        /*$sap_bill = $sap_conn->table('')->where()->limit(1)->get();
    	if(){

    	}*/
    	
    }

    public function 
}
