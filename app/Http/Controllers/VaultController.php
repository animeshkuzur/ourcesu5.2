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

    public function datedocs(Request $request){
        $document = array();
        $date = array();
        $data = $request->only('cont_acc','doc_type');
        if(!$data['cont_acc']){
            return response()->json(['error' => 'cont_acc parameter absent']);
        }
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
                $mtr_pro = \DB::table('OW.dbo.MTR_PROT_SHEET')->where('CONTRACT_ACC',$data['cont_acc'])->orderby('CP_Date','DESC')->get(['CP_Date']);
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
                $sap_bill = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$data['cont_acc'])->orderby('BILL_MONTH','DESC')->get(['BILL_MONTH']);
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
                $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$data['cont_acc'])->orderby('BillMonth','DESC')->get(['BillMonth']);
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
                $ser_req = \DB::table('OFFLINE_MAS.dbo.CC_REQ_MAS_NEW')->where('CONTRACT_ACC',$data['cont_acc'])->orderby('REQUEST_DATE','DESC')->get(['REQUEST_DATE']);
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
                return response()->json(['error'=>'invalid_document_id']);
        }

        return response()->json([
            'document_id' => $document['id'],
            'document_name' => $document['name'],
            'document_type' => $document['type'],
            'dates' => $date,
        ]);
    }

    public function getdocs(Request $request){
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
