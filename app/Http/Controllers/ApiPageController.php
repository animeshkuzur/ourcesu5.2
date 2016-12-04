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
        $stl_conn = \DB::connection('sqlsrv_STL');
        $USER_DATA = $stl_conn->table('BILLING_OUTPUT_2016')->where('CONTRACT_ACC', $user->cont_acc)->limit(1)->get();        
        
    	return response()->json([
            'meter_no'=>$USER_DATA[0]->METER_NO,
            'meter_owner' => $user->name,
            'meter_type' => $USER_DATA[0]->MTR_STAT,
            'meter_rent' => $USER_DATA[0]->MFC,
            'meter_make' => 'NULL',
            'meter_remaining_month' => 'NULL',
            'meter_status' => $USER_DATA[0]->READ_REMARK,
            'meter_location' => 'NULL',
            'meter_installed_on' => 'NULL',
            ]);	
    }

    public function connection(){
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

    	return response()->json(['null'=>null]);
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

    	return response()->json(['null' => null]);
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

    	return response()->json(['null' => null]);
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

    	return response()->json(['null' => null]);
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
