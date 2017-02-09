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
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                
                break;
            case '2':
                $docs = \DB::table('documents')->where('documents.id',2)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '3':
                $docs = \DB::table('documents')->where('documents.id',3)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $emobile = \DB::table('VW_SPOT_MR_DETAILS')->where('CONTRACT_ACC', $user->cont_acc)->orderBy('BillMonth', 'DESC')->get(['BillMonth']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($emobile){
                    foreach ($emobile as $data) {
                        array_push($date,$data->BillMonth);
                    }
                }
                break;
            case '4':
                $docs = \DB::table('documents')->where('documents.id',4)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                break;
            case '5':
                $docs = \DB::table('documents')->where('documents.id',5)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $foc = \DB::table('Network_Mas.dbo.FOC_Slip')->where('CONTRACT_ACC',$user->cont_acc)->orderBy('REQ_DATE', 'DESC')->get(['REQ_DATE']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($foc){
                    foreach ($foc as $data) {
                        array_push($date,$data->REQ_DATE);
                    }
                }
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
                $cons_acc = \DB::table('user_details')->where('cont_acc',$user->cont_acc)->limit(1)->get(['cons_acc']);
                $mon = \DB::table('VW_PAYMENT_RECEIPT')->where('CONS_ACC',$cons_acc[0]->cons_acc)->orderby('BillMonth','DESC')->limit(1)->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                if($mon){
                    foreach ($mon as $data) {
                        array_push($date,$data->pay_date);
                    }
                }
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
                return response()->json(['error'=>'invalid_document_id']);
        }

        return response()->json([
            'document_id' => $document['id'],
            'document_name' => $document['name'],
            'document_type' => $document['type'],
            'dates' => $date,
        ]);
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

        $data = $request->only('date','doc_type');

        switch($data['doc_type']){
            case '1':
                $docs = \DB::table('documents')->where('documents.id',1)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                
                break;
            case '2':
                $docs = \DB::table('documents')->where('documents.id',2)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;

                break;
            case '3':
                $docs = \DB::table('documents')->where('documents.id',3)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $emobile = \DB::table('VW_SPOT_MR_DETAILS')->where('CONTRACT_ACC', $user->cont_acc)->where('BillMonth', $data['date'])->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                if($emobile){
                    $path = 'E:/TNINE/OURCESU/public/temp/documents/'.$user->cont_acc.'-03.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-03.pdf';
                    $pdf = \PDF::loadView('documents.e-mobile-receipt', ['dat'=>$emobile[0]]);
                    $pdf->save($path,$overwrite = true);
                    $document['url'] = $url;
                }
                break;
            case '4':
                $docs = \DB::table('documents')->where('documents.id',4)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                break;
            case '5':
                $docs = \DB::table('documents')->where('documents.id',5)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $foc = \DB::table('Network_Mas.dbo.FOC_Slip')->where('CONTRACT_ACC',$user->cont_acc)->where('REQ_DATE', $data['date'])->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                if($foc){
                    $path = 'E:/TNINE/OURCESU/public/temp/documents/'.$user->cont_acc.'-05.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-05.pdf';
                    $pdf = \PDF::loadView('documents.foc-slip', ['dat'=>$foc[0]]);
                    $pdf->save($path,$overwrite = true);
                    $document['url'] = $url;
                }
                break;
            case '6':
                $docs = \DB::table('documents')->where('documents.id',6)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                break;
            case '7':
                $docs = \DB::table('documents')->where('documents.id',7)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                break;
            case '8':
                $docs = \DB::table('documents')->where('documents.id',8)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $mtr_pro = \DB::table('OW.dbo.MTR_PROT_SHEET')->where('CONTRACT_ACC',$user->cont_acc)->where('CP_Date',$data['date'])->get();
                $connect = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$user->cont_acc)->limit(1)->get();
                $rp_meter = \DB::table('OW.dbo.MTR_PROT_SHEET')->where('CONTRACT_ACC',$user->cont_acc)->where('CP_Date',$data['date'])->join('OW.dbo.tblMeterLocation','OW.dbo.tblMeterLocation.Location_Id','=','OW.dbo.MTR_PROT_SHEET.RP_MeterLocation')->join('OW.dbo.tblConnectionType','OW.dbo.tblConnectionType.Connection_Id','=','OW.dbo.MTR_PROT_SHEET.RP_Connection')->join('OW.dbo.tblBox','OW.dbo.tblBox.Box_Id','=','OW.dbo.MTR_PROT_SHEET.RP_Box')->join('OW.dbo.tblServiceLine','OW.dbo.tblServiceLine.SrvLineId','=','OW.dbo.MTR_PROT_SHEET.RP_ServiceLine')->limit(1)->get();
                $mr = \DB::table('OW.dbo.MTR_PROT_SHEET')->join('OW.dbo.tblMeterMake','OW.dbo.tblMeterMake.Make_Id','=','OW.dbo.MTR_PROT_SHEET.MR_MeterMake')->join('OW.dbo.tblMeterType','OW.dbo.tblMeterType.TypeId','=','OW.dbo.MTR_PROT_SHEET.MR_MeterType')->join('OW.dbo.tblMeterPhase','OW.dbo.tblMeterPhase.Phase_Id','=','OW.dbo.MTR_PROT_SHEET.MR_MeterPhase')->where('CONTRACT_ACC',$user->cont_acc)->where('CP_Date',$data['date'])->limit(1)->get();
                $mi = \DB::table('OW.dbo.MTR_PROT_SHEET')->join('OW.dbo.tblMeterMake','OW.dbo.tblMeterMake.Make_Id','=','OW.dbo.MTR_PROT_SHEET.MI_MeterMake')->join('OW.dbo.tblMeterType','OW.dbo.tblMeterType.TypeId','=','OW.dbo.MTR_PROT_SHEET.MI_MeterType')->join('OW.dbo.tblMeterPhase','OW.dbo.tblMeterPhase.Phase_Id','=','OW.dbo.MTR_PROT_SHEET.MI_MeterPhase')->where('CONTRACT_ACC',$user->cont_acc)->where('CP_Date',$data['date'])->limit(1)->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                if($mtr_pro){
                    $path = 'E:/TNINE/OURCESU/public/temp/documents/'.$user->cont_acc.'-08.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-08.pdf';
                    if(empty($mr)){
                        $pdf = \PDF::loadView('documents.meter-protocol', ['dat'=>$mtr_pro[0],'conn'=>$connect[0],'rp'=>$rp_meter[0],'mr'=>$mr,'mi'=>$mi[0]]);
                        $pdf->save($path,$overwrite = true);
                    }
                    else{
                        $pdf = \PDF::loadView('documents.meter-protocol', ['dat'=>$mtr_pro[0],'conn'=>$connect[0],'rp'=>$rp_meter[0],'mr'=>$mr[0],'mi'=>$mi[0]]);
                        $pdf->save($path,$overwrite = true);
                    }
                    
                    
                    $document['url'] = $url;
                }
                break;
            case '9':
                $docs = \DB::table('documents')->where('documents.id',9)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $cons_acc = \DB::table('user_details')->where('cont_acc',$user->cont_acc)->limit(1)->get(['cons_acc']);
                $mon = \DB::table('VW_PAYMENT_RECEIPT')->where('CONS_ACC',$cons_acc[0]->cons_acc)->where('BillMonth',$data['date'])->limit(1)->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                if($mon){
                    $path = 'E:/TNINE/OURCESU/public/temp/documents/'.$user->cont_acc.'-09.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-09.pdf';
                    $pdf = \PDF::loadView('documents.money-receipt', ['dat'=>$mon[0]]);
                    $pdf->save($path,$overwrite = true);
                    $document['url'] = $url;
                }
                break;
            case '10':
                $docs = \DB::table('documents')->where('documents.id',10)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                break;
            case '11':
                $docs = \DB::table('documents')->where('documents.id',11)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $sap_bill = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$user->cont_acc)->where('BILL_MONTH',$data['date'])->get(['BILL_MONTH']);
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                if($sap_bill){
                    $path = 'E:/TNINE/OURCESU/public/temp/documents/'.$user->cont_acc.'-11.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-11.pdf';
                    $pdf = \PDF::loadView('documents.sap-bill', ['dat'=>$sap_bill[0]]);
                    $pdf->save($path,$overwrite = true);
                    $document['url'] = $url;
                }
                break;
        	case '12' :	
                $docs = \DB::table('documents')->where('documents.id',12)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$user->cont_acc)->where('BillMonth',$data['date'])->limit(1)->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['date'] = $data['date'];
                $document['url'] = null;
                if($spot_bill){
                    $path = 'E:/TNINE/OURCESU/public/temp/documents/'.$user->cont_acc.'-12.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-12.pdf';
                    $pdf = \PDF::loadView('documents.spot-bill', ['dat'=>$spot_bill[0]]);
                    $pdf->save($path,$overwrite = true);
                    $document['url'] = $url;
                }
                
        		break;
        	case '13':
                $docs = \DB::table('documents')->where('documents.id',13)->join('document_types','document_types.id','=','documents.type')->get(['documents.id','documents.name','document_types.name as type']);
                $ser_req = \DB::table('OFFLINE_MAS.dbo.CC_REQ_MAS_NEW')->where('CONTRACT_ACC',$user->cont_acc)->where('REQUEST_DATE',$data['date'])->join('OFFLINE_MAS.dbo.CC_SERVICE_TYPE_GROUP_MAS','OFFLINE_MAS.dbo.CC_SERVICE_TYPE_GROUP_MAS.SERVICE_TYPE_GROUP_ID','=','OFFLINE_MAS.dbo.CC_REQ_MAS_NEW.SERVICE_TYPE_GROUP_ID')->join('OFFLINE_MAS.dbo.CC_SERVICE_TYPE_MAS','OFFLINE_MAS.dbo.CC_SERVICE_TYPE_MAS.SERVICE_TYPE_ID','=','OFFLINE_MAS.dbo.CC_REQ_MAS_NEW.SERVICE_TYPE_ID')->get();
                $document['id'] = $docs[0]->id;
                $document['name'] = $docs[0]->name;
                $document['type'] = $docs[0]->type;
                $document['url'] = null;
                if($ser_req){
                    $path = 'C:/xampp/htdocs/ourcesu5.2/public/temp/documents/'.$user->cont_acc.'-13.pdf';
                    $url = 'https://ourcesu.com/temp/documents/'.$user->cont_acc.'-13.pdf';
                    $pdf = \PDF::loadView('documents.service-request', ['dat'=>$ser_req[0]]);
                    $pdf->save($path,$overwrite = true);
                    $document['url'] = $url;
                }
                
                break;
        	default :	
                return response()->json(['error' => 'invalid_document_id']);				
        }

        return response()->json([
            'document_id' => $document['id'],
            'document_name' => $document['name'],
            'document_type' => $document['type'],
            'document_url' => $document['url'],
        ]);

    	
    }
}
