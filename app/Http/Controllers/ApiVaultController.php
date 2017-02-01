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
    public function datedocs(Request $request){
        $document = array();
        $date = array();
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

        $data = $request->only('doc_type');

        if(!$data['doc_type']){
            return response()->json(['error' => 'doc_type parameter absent']);
        }        

        switch ($data['doc_type']) {
            case '1':
                $docs = \DB::table('documents')->where('documents.id',1)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                
                
                break;
            case '2':
                $docs = \DB::table('documents')->where('documents.id',2)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);

                break;
            case '3':
                $docs = \DB::table('documents')->where('documents.id',3)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;

                break;
            case '4':
                $docs = \DB::table('documents')->where('documents.id',4)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '5':
                $docs = \DB::table('documents')->where('documents.id',5)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '6':
                $docs = \DB::table('documents')->where('documents.id',6)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '7':
                $docs = \DB::table('documents')->where('documents.id',7)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '8':
                $docs = \DB::table('documents')->where('documents.id',8)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $mtr_pro = \DB::table('OW.dbo.MTR_PROT_SHEET')->where('CONTRACT_ACC',$user->cont_acc)->orderby('CP_Date','DESC')->get(['CP_Date']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($mtr_pro){
                    foreach ($mtr_pro as $data) {
                        array_push($date,$data->CP_Date);
                    }
                }
                break;
            case '9':
                $docs = \DB::table('documents')->where('documents.id',9)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '10':
                $docs = \DB::table('documents')->where('documents.id',10)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '11':
                $docs = \DB::table('documents')->where('documents.id',11)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $sap_bill = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$user->cont_acc)->orderby('BILL_MONTH','DESC')->get(['BILL_MONTH']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($sap_bill){
                    foreach ($sap_bill as $data) {
                        array_push($date,$data->BILL_MONTH);
                    }
                }
                break;
            case '12':
                $docs = \DB::table('documents')->where('documents.id',12)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$user->cont_acc)->orderby('BillMonth','DESC')->get(['BillMonth']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($spot_bill){
                    foreach ($spot_bill as $data) {
                        array_push($date,$data->BillMonth);
                    }
                }
                break;
            case '13':
                $docs = \DB::table('documents')->where('documents.id',13)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $ser_req = \DB::table('OFFLINE_MAS.dbo.CC_REQ_MAS_NEW')->where('CONTRACT_ACC',$user->cont_acc)->orderby('REQUEST_DATE','DESC')->get(['REQUEST_DATE']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($ser_req){
                    foreach ($ser_req as $data) {
                        array_push($date,$data->REQUEST_DATE);
                    }
                }
                break;
            default:
                return response()->json(['error'=>'invalid document id']);
                break;
        }

        return response()->json([
            'document_id' => $document['id'],
            'document_name' => $document['name'],
            'document_type' => $document['type'],
            'dates' => $date,
        ]);
    }
    public function getdocs(Request $request){
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
        				$spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$data['date']])->limit(1)->get();
        				if($spot_bill){
				        	$document['name'] = "Spot Bill";
				        	$document['date'] = $data['date'];
				        	$document['type'] = "Bill";
				            $document['id'] = 12;
				        	array_push($result,$document);
				        }
        				break;
        	case '3' : 
        				$emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $data['date']])->limit(1)->get();
        				if($emobile){
				            $document['name'] = "E-Mobile Receipt";
				            $document['date'] = $data['date'];
				            $document['type'] = "Receipt";
				            $document['id'] = 3;
				            array_push($result,$document);
				        }
        				break;
        	case '11' : 
        				$sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $data['date']])->limit(1)->get();
        				if($sap_bill){
				            $document['name'] = "Sap Bill";
				            $document['date'] = $data['date'];
				            $document['type'] = "Bill";
				            $document['id'] = 11;
				            array_push($result,$document);
				        }
        				break;
        	default :	
        				$spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$data['date']])->limit(1)->get();
            			$emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $data['date']])->limit(1)->get();
            			$sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $data['date']])->limit(1)->get();

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
        				$spot_bill = $stl_conn->table('BILLING_OUTPUT_2016')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth'=>$data['date']])->limit(1)->get();
        				if($spot_bill){
				        	$document['name'] = "Spot Bill";
				        	$document['date'] = $data['date'];
				        	$document['type'] = "Bill";
				            $document['id'] = 12;
				            $path = 'C:/xampp/htdocs/ourcesu5.2/public/temp/documents/'.$data['cont_acc'].'-12.pdf';
                            $url = 'https://ourcesu.com/temp/documents/'.$data['cont_acc'].'-12.pdf';
                            $pdf = \PDF::loadView('documents.spot-bill', ['dat'=>$spot_bill[0]]);
                            $pdf->save($path,$overwrite = true);
				            $document['url'] = $url;
				        	array_push($result,$document);
				        }
        				break;
        	case '3' : 
        				$emobile = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BillMonth' => $data['date']])->limit(1)->get();
        				if($emobile){
				            $document['name'] = "E-Mobile Receipt";
				            $document['date'] = $data['date'];
				            $document['type'] = "Receipt";
				            $document['id'] = 3;
				            array_push($result,$document);
				        }
        				break;
        	case '11' : 
        				$sap_bill = $sap_conn->table('BILLING_DATA')->where(['CONTRACT_ACC'=> $data['cont_acc'],'BILL_MONTH' => $data['date']])->limit(1)->get();
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

    	return response()->json(['documents' => $result]);
    }
}
