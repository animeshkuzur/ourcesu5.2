<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiPageController extends Controller
{
    public function supply(){
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
        $grid_name ="NULL";$grid_code ="NULL";$substation_name="NULL";$substation_code="NULL";
        $add_conn = \DB::connection('sqlsrv_ADD');
    	$dt_no = $add_conn->table('CONS_POLE_MAS')->where('CONTRACT_ACC', $user->cont_acc)->limit(1)->get(['DT_NO']);
    	$dt_data = $add_conn->table('TRANS_MAS')->where('CODE', $dt_no[0]->DT_NO)->limit(1)->get();
    	$connections = $add_conn->table('CONS_POLE_MAS')->where('DT_NO', $dt_no[0]->DT_NO)->groupBy('DT_NO')->count();
    	$feeder = $add_conn->table('TRANS_MAS')->where('CODE', $dt_data[0]->LINK_TO)->limit(1)->get();
    	$substation = $add_conn->table('TRANS_MAS')->where('CODE', $feeder[0]->LINK_TO)->limit(1)->get();
        if($substation){
            $grid = $add_conn->table('TRANS_MAS')->where('CODE', $substation[0]->LINK_TO)->limit(1)->get();
            $substation_code = $substation[0]->CODE;
            $substation_name = $substation[0]->NAME;
            if($grid){
                $grid_name = $grid[0]->NAME;
                $grid_code = $grid[0]->CODE;
            }
        }
        
    	
    	return response()->json([
    		'dt_no' => $dt_data[0]->CODE,
    		'dt_name' => $dt_data[0]->NAME,
    		'dt_capacity' => $dt_data[0]->RATING,
    		'dt_load' => $dt_data[0]->VOLT_LEVEL."V",
    		'people_connected' => (string)$connections,
    		'feeder_no' => $feeder[0]->CODE,
    		'feeder_name' => $feeder[0]->NAME,
    		'substation_no' => $substation_code,
    		'substation_name' => $substation_name,
    		'grid_no' => $grid_code,
    		'grid_name' => $grid_name,
    		'outage_notice' => NULL,
    		]);



    	return response()->json(['null'=>null]);
    }

    public function meter(){
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
        $USER_DATA = \DB::table('OW.dbo.MTR_PROT_SHEET')->where('CONTRACT_ACC', $user->cont_acc)->join('OW.dbo.tblMeterLocation','OW.dbo.tblMeterLocation.Location_Id','=','OW.dbo.MTR_PROT_SHEET.RP_MeterLocation')->join('OW.dbo.tblMeterMake','OW.dbo.tblMeterMake.Make_Id','=','OW.dbo.MTR_PROT_SHEET.MI_MeterMake')->join('OW.dbo.tblMeterPhase','OW.dbo.tblMeterPhase.Phase_Id','=','OW.dbo.MTR_PROT_SHEET.MI_MeterPhase')->join('OW.dbo.tblMeterType','OW.dbo.tblMeterType.TypeId','=','OW.dbo.MTR_PROT_SHEET.MI_MeterType')->limit(1)->get();
        $meter_rent = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$user->cont_acc)->orderBy('BILL_MONTH','DESC')->get(['CUR_MR']);
    	return response()->json([
            'meter_no'=>$USER_DATA[0]->MI_MeterNo,
            'meter_owner' => $USER_DATA[0]->CP_Name,
            'meter_type' => $USER_DATA[0]->Type_Detail,
            'meter_rent' => $meter_rent[0]->CUR_MR,
            'meter_make' => $USER_DATA[0]->Make_Detail,
            'meter_remaining_month' => 'NULL',
            'meter_status' => 'OK',
            'meter_location' => $USER_DATA[0]->Location_Detail,
            'meter_installed_on' => $USER_DATA[0]->CP_Date,
        ]);	
    }

    public function meterhist(){
        $result = array();
        $temp = array();
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
        $USER_DATA = \DB::table('OW.dbo.MTR_PROT_SHEET')->where('CONTRACT_ACC', $user->cont_acc)->join('OW.dbo.tblMeterLocation','OW.dbo.tblMeterLocation.Location_Id','=','OW.dbo.MTR_PROT_SHEET.RP_MeterLocation')->join('OW.dbo.tblMeterMake','OW.dbo.tblMeterMake.Make_Id','=','OW.dbo.MTR_PROT_SHEET.MR_MeterMake')->get();
        /*if(empty($USER_DATA)){
            return response()->json(['history' => null]); 
        }*/
        foreach ($USER_DATA as $dat) {
            $temp = [
                'meter_no'=>$dat->MR_MeterNo,
                'meter_make' => $dat->Make_Detail,
                'meter_location' => $dat->Location_Detail,
            ];
            array_push($result,$temp);
        }
        return response()->json([
            'history' => $result
        ]);    
    }

    public function connection(){
        $address = array();
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
        $data = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$user->cont_acc)->limit(1)->get();
        $address['address'] = $data[0]->CON_ADD3;
        $address['sub_division'] = $data[0]->SUB_DIVISION;
        $address['section'] = $data[0]->SECTION;
        $address['business_unit_name'] = $data[0]->BU_NAME;
        $address['service_unit_name'] = $data[0]->SU_NAME;
        $address['village'] = $data[0]->VILLAGE;

    	return response()->json([
            'contract_acc' => $data[0]->CONTRACT_ACC,
            'customer_acc_no' => $data[0]->CONS_ACC,
            'connection_type' => $data[0]->ORG_TYPE_DESC,
            'sub_connection_type' => $data[0]->ORG_GROUP_DESC,
            'supply_address' => $address,
            'supply_category' => $data[0]->CATEGORY,
            'tariff_category' => $data[0]->CON_LOAD,
            'route_no' => $data[0]->ROUTE_OWNER_CODE,
            'billing_portion' => $data[0]->PORTION,
            'billing_portion_code' => $data[0]->PORTION_NO,
            'connection_since' => $data[0]->MTR_INST_DATE,
            'reg_mobile_no' => $data[0]->REG_MOB_NO,
        ]);
    }

    public function reading(){
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
        $date = date('Y').date('m');
        $data = \DB::table('READING.dbo.READING_MAS')->where('BILL_MONTH',$date)->where('CONTRACT_ACC',$user->cont_acc)->join('READING.dbo.RD_REMARK_MAS','READING.dbo.RD_REMARK_MAS.REMARK_NAME','=','READING.dbo.READING_MAS.READING_NOTE')->join('READING.dbo.READ_SOURCE_MAS','READING.dbo.READ_SOURCE_MAS.SOURCE_ID','=','READING.dbo.READING_MAS.READ_SOURCE')->get([
                'READING.dbo.READING_MAS.READING_DATE','READING.dbo.READING_MAS.READING','READING.dbo.RD_REMARK_MAS.REMARK_DESC','READING.dbo.READING_MAS.UNITS_BILLED','READING.dbo.READ_SOURCE_MAS.SOURCE_DESC'
            ]);
        $schedule_date = new \DateTime($data[0]->READING_DATE);
        $schedule_date->modify('+33 day');
        
        return response()->json([
            'shedule_reading' => $schedule_date->format('Y-m-d'),
            'previous_reading' => $data[0]->READING,
            'previous_reading_date' => $data[0]->READING_DATE,
            'previous_reading_remark'=> $data[0]->REMARK_DESC,
            'last_consumption' => $data[0]->UNITS_BILLED,
            'no_of_days' => '31',
            'reading_source' => $data[0]->SOURCE_DESC,
        ]); 
    }

    public function readinghist(){
        $result = array();
        $temp = array();
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
        $data = \DB::table('READING.dbo.READING_MAS')->where('CONTRACT_ACC',$user->cont_acc)->join('READING.dbo.RD_REMARK_MAS','READING.dbo.RD_REMARK_MAS.REMARK_NAME','=','READING.dbo.READING_MAS.READING_NOTE')->join('READING.dbo.READ_SOURCE_MAS','READING.dbo.READ_SOURCE_MAS.SOURCE_ID','=','READING.dbo.READING_MAS.READ_SOURCE')->orderBy('BILL_MONTH','DESC')->get([
                'READING.dbo.READING_MAS.READING_DATE','READING.dbo.READING_MAS.READING','READING.dbo.RD_REMARK_MAS.REMARK_DESC','READING.dbo.READING_MAS.UNITS_BILLED','READING.dbo.READ_SOURCE_MAS.SOURCE_DESC','READING.dbo.READING_MAS.BILL_MONTH'
            ]);
        foreach ($data as $dat) {
            $temp = [
                    'previous_reading' => $dat->READING,
                    'previous_reading_date' => $dat->READING_DATE,
                    'previous_reading_remark'=> $dat->REMARK_DESC,
                    'last_consumption' => $dat->UNITS_BILLED,
                    'no_of_days' => '31',
                    'reading_source' => $dat->SOURCE_DESC,
                ];
            array_push($result,$temp);
        }
        return response()->json(['reading_history' => $result]);
    }

    public function bill(){
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
        $date = date('Ym');
        $last_date = date("Ym", strtotime("-1 months"));
        $data = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$user->cont_acc)->where('BillMonth',$date)->get();
        $last_data = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$user->cont_acc)->where('BillMonth',$last_date)->get();
    	return response()->json([
            'last_bill_date' => $last_data[0]->BILL_DATE,
            'last_bill_amount' => $last_data[0]->CUR_BILL,
            'due_date' => $data[0]->due_date,
            'rebate' => $data[0]->REBATE_OFF,
            'meter_rent' => $data[0]->CUR_MR,
            'units_billed' => $data[0]->UNITS_BILLED,
            'energy_charge' => $data[0]->CUR_EC,
            'electricity_duty' => $data[0]->CUR_ED,
            'mmfc' => $data[0]->MMFC,
            'amt_before_due_date' => $data[0]->BILL_BEFORE_DUT_DT,
            'amt_after_due_date' => $data[0]->BILL_AFTER_DUT_DT,
            'total' => $data[0]->CUR_BILL,
        ]);
    }

    public function payment(){
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
        $cons_acc = \DB::table('user_details')->where('cont_acc',$user->cont_acc)->limit(1)->get(['cons_acc']);
        $data = \DB::table('VW_PAYMENT_RECEIPT')->where('CONS_ACC',$cons_acc[0]->cons_acc)->orderby('BillMonth','DESC')->limit(1)->get();
    	return response()->json([
            'last_payment_date' => $data[0]->Billmonth,
            'last_payment_amount' => $data[0]->RevenueAmt+$data[0]->CapitalAmt+$data[0]->MiscAmt,
            'payment_received_at' => $data[0]->pay_date,
            'received_by' => $data[0]->BillCollName,
            'rebate_availed' => 0.00,
            'DPS_charge' => 0.00,
            'payment_mode' => $data[0]->PayMode,
            'receipt_no' => $data[0]->ReceiptNo,
        ]);
    }

    public function paymenthist(){
        $result = array();
        $temp = array();
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
        $cons_acc = \DB::table('user_details')->where('cont_acc',$user->cont_acc)->limit(1)->get(['cons_acc']);
        $data = \DB::table('VW_PAYMENT_RECEIPT')->where('CONS_ACC',$cons_acc[0]->cons_acc)->orderby('BillMonth','DESC')->get();
        foreach ($data as $dat) {
            $temp['last_payment_date'] = $dat->Billmonth;
            $temp['last_payment_amount'] = $dat->RevenueAmt+$dat->CapitalAmt+$dat->MiscAmt;
            $temp['payment_received_at'] = $dat->pay_date;
            $temp['received_by'] = $dat->BillCollName;
            $temp['payment_mode'] = $dat->PayMode;
            $temp['receipt_no'] = $dat->ReceiptNo;
            array_push($result,$temp);
        }
        return response()->json([
            'history' => $result
        ]);
    }

    public function sixmonthpayment(){
        $result = array();
        $temp = array();
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
        $cons_acc = \DB::table('user_details')->where('cont_acc',$user->cont_acc)->limit(1)->get(['cons_acc']);
        $data = \DB::table('VW_PAYMENT_RECEIPT')->where('CONS_ACC',$cons_acc[0]->cons_acc)->orderby('BillMonth','DESC')->limit(6)->get();
        foreach ($data as $dat) {
            $temp['last_payment_date'] = $dat->Billmonth;
            $temp['last_payment_amount'] = $dat->RevenueAmt+$dat->CapitalAmt+$dat->MiscAmt;
            $temp['payment_received_at'] = $dat->pay_date;
            $temp['received_by'] = $dat->BillCollName;
            $temp['payment_mode'] = $dat->PayMode;
            $temp['receipt_no'] = $dat->ReceiptNo;
            array_push($result,$temp);
        }
        return response()->json([
            'history' => $result
        ]);
    }

    public function paymentnotice(){
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

        return response()->json(['info' => 'lorium impum blah blah blah']);
        
    }

    public function compliance(){
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

    	return response()->json(['null' => null]);
    }

    public function care(){
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

    	return response()->json(['info' => 'lorium impum blah blah blah']);
    }
}
