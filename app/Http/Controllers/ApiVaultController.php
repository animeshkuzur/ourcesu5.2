<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Guest;
use App\User_Detail;

class ApiVaultController extends Controller
{
    public function getdocs(Request $request){
    	$result = array();
    	$document = array();
    	$stl_conn = \DB::connection('sqlsrv_STL');
    	$sap_conn = \DB::connection('sqlsrv_SAP');
    	try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'token_absent'], $e->getStatusCode());
        }

        $data = $request->only('cont_acc','date','doc_type');

        switch($data['doc_type']){
        	case '12' :	
        				$spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$date])->limit(1)->get();
        				if($spot_bill){
				        	$document['name'] = "Spot Bill";
				        	$document['date'] = $data['date'];
				        	$document['type'] = "Bill";
				            $document['id'] = 12;
				        	array_push($result,$document);
				        }
        				break;
        	case '3' : 
        				$emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $date])->limit(1)->get();
        				if($emobile){
				            $document['name'] = "E-Mobile Receipt";
				            $document['date'] = $data['date'];
				            $document['type'] = "Receipt";
				            $document['id'] = 3;
				            array_push($result,$document);
				        }
        				break;
        	case '11' : 
        				$sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $date])->limit(1)->get();
        				if($sap_bill){
				            $document['name'] = "Sap Bill";
				            $document['date'] = $data['date'];
				            $document['type'] = "Bill";
				            $document['id'] = 11;
				            array_push($result,$document);
				        }
        				break;
        	default :	
        				$spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$date])->limit(1)->get();
            			$emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $date])->limit(1)->get();
            			$sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $date])->limit(1)->get();

            			if($spot_bill){
				        	$document['name'] = "Spot Bill";
				        	$document['date'] = $data['date'];
				        	$document['type'] = "Bill";
				            $document['id'] = 12;
				        	array_push($result,$document);
				        }
				        if($emobile){
				            $document['name'] = "E-Mobile Receipt";
				            $document['date'] = $data['date'];
				            $document['type'] = "Receipt";
				            $document['id'] = 3;
				            array_push($result,$document);
				        }
				        if($sap_bill){
				            $document['name'] = "Sap Bill";
				            $document['date'] = $data['date'];
				            $document['type'] = "Bill";
				            $document['id'] = 11;
				            array_push($result,$document);
				        }
        }
    	
    	return response()->json(['documents' => $result]);
    }

    public function urldocs(Request $request){
    	$result = array();
    	$document = array();
    	try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'token_absent'], $e->getStatusCode());
        }

        $data = $request->only('cont_acc','date','doc_type');

        switch($data['doc_type']){
        	case '12' :	
        				$spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$date])->limit(1)->get();
        				if($spot_bill){
				        	$document['name'] = "Spot Bill";
				        	$document['date'] = $data['date'];
				        	$document['type'] = "Bill";
				            $document['id'] = 12;
				        	array_push($result,$document);
				        }
        				break;
        	case '3' : 
        				$emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $date])->limit(1)->get();
        				if($emobile){
				            $document['name'] = "E-Mobile Receipt";
				            $document['date'] = $data['date'];
				            $document['type'] = "Receipt";
				            $document['id'] = 3;
				            array_push($result,$document);
				        }
        				break;
        	case '11' : 
        				$sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $date])->limit(1)->get();
        				if($sap_bill){
				            $document['name'] = "Sap Bill";
				            $document['date'] = $data['date'];
				            $document['type'] = "Bill";
				            $document['id'] = 11;
				            array_push($result,$document);
				        }
        				break;
        	default :	
        				
        }

    	return 0;
    }
}
