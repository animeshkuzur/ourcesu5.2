<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User_Detail;
use APP\Document;

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
        $stl_conn = \DB::connection('sqlsrv_STL');
        $sap_conn = \DB::connection('sqlsrv_SAP');
    	$data = $request->only('cont_acc','date','docid');
    	$arydate = explode("-",$data['date']);
    	$date = $arydate[1].$arydate[0];
        if($data['docid']==0){
            $spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$date])->limit(1)->get();
            $emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $date])->limit(1)->get();
            $sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $date])->limit(1)->get();
        }
        if($spot_bill){
        	$document['name'] = "Spot Bill";
        	$document['date'] = $data['date'];
        	$document['type'] = "Bill";
            $document['id'] = 12;
        	$result[0] = $document;
        }
        if($emobile){
            $document['name'] = "E-Mobile Receipt";
            $document['date'] = $data['date'];
            $document['type'] = "Receipt";
            $document['id'] = 3;
            $result[1] = $document;
        }
        if($sap_bill){
            $document['name'] = "Sap Bill";
            $document['date'] = $data['date'];
            $document['type'] = "Bill";
            $document['id'] = 11;
            $result[2] = $document;
        }
        //$sap_bill = $

        //$result[1]=$document;
        return response()->json(['data' => $result]);

        /*$sap_bill = $sap_conn->table('')->where()->limit(1)->get();
    	if(){

    	}*/
    	
    }

    public function docview($contacc,$date,$docid){
        
        return response()->json(['docid' => $docid,'contacc' => $contacc,'date'=>$date]);
    }

    //public function 
}
