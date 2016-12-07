<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Guest;
use App\User_Detail;

class ApiAuthController extends Controller
{
    public function login(Request $request){
        $count=0;
        $data = $request->only('email','password');
        if(empty($data['email']) || empty($data['password'])){
            return response()->json(['error' => 'parameters missing']);
        }
        try {
            if (!$token = JWTAuth::attempt($data)) {
                return response()->json(['error' => 'invalid credentials'], 401);
            }
        } 
        catch (JWTException $e) {
            return response()->json(['error' => 'could not create token'], 500);
        }

        $users = User::where('email',$data['email'])->get();       
        foreach ($users as $user) {
            $id = $user->id; 
            $name = $user->name; 
            $email = $user->email; 
            //$cont_acc = $user->cont_acc;
            $phone = $user->phone;
        }
        $user_data = \DB::table('user_details')->where('user_id',$id)->get();
        foreach ($user_data as $user_dat) {
            $count=$count+1;
            $cont_acc = $user_dat->cont_acc;
        }
        if($count>1){
            return response()->json(['info' => $user_data,'token' => $token]);  
        }
        else{
            User::where('id',$id)->update(['cont_acc' => $cont_acc]);
        }

        return response()->json([
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'cont_acc'=>$cont_acc,
                    'cons_acc'=>$user_data[0]->cons_acc,
                    'token'=>$token,
            ]);
        

    }

    public function getuser()
    {
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
        if(empty($user->cont_acc)){
            return response()->json(['error' => 'select a cont_acc']);
        }
        $data = User_Detail::where('user_id',$user->id)->get(['cont_acc']);
        return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'cont_acc' => $data,
            ]);
    }

    public function logout(Request $request)
    {
        try {
        	JWTAuth::invalidate($request->input('token'));
        	return response()->json(['info' => 'token_destroyed']);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'token_absent'], $e->getStatusCode());
        }
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(['error' => 'token_absent']);
        }
        try {
            $refreshedToken = JWTAuth::refresh($token);
            return response()->json(['token' => $refreshedToken]);
        } 
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'token_absent'], $e->getStatusCode());
        } 
    }

    public function register(Request $request){
        $count=0;$u_id=0;
        $contacc = $request->get('cont_acc');
    	$data=$request->only('name','email','password','phone');
        if(empty($data['name']) || empty($data['email']) || empty($data['password']) || empty($data['phone']) || empty($contacc)){
            return response()->json(['error'=>'parameters missing']);
        }
        $stl_conn = \DB::connection('sqlsrv_STL');
        foreach ($contacc as $accnos){
            $count=$count+1;            
            $USER_DATA = $stl_conn->table('BILLING_OUTPUT_2016')->where('CONTRACT_ACC', $accnos)->limit(1)->get();
            if(empty($USER_DATA)){
                return response()->json(['errorInfo' => 'Contract Account Number '.$count.' does not exist'], 401);
            }
        }
    	$data['password'] = bcrypt($data['password']);
        try{
            $user=\DB::table('users')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'cont_acc' => "NULL",
                'phone' => $data['phone'],
            ]);
            
            $user_id = User::where('email',$data['email'])->get();
            $u_id = $user_id[0]->id;
            foreach ($contacc as $accno) {
                $U_DATA = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $accno)->limit(1)->get();
                foreach ($U_DATA as $DAT) {
                    $user_details = \DB::table('user_details')->insert([
                    'cont_acc' => $DAT->CONTRACT_ACC,
                    'cons_acc' => $DAT->CONS_ACC,
                    'user_id' => $u_id,
                    ]);
                }                        
            }
            if($user_details){
                return response()->json(['info' => 'user_registered'], 200);
            }
            else{
                return response()->json(['error' => 'credentials_exists'], 401);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(['error' => 'credentials_exists'], 401);
        }
    }

    public function selectacc(Request $request){
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['errorInfo' => 'user_not_found'], 404);
            }            
        } 
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['errorInfo' => 'token_expired'], $e->getStatusCode());
        } 
        catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['errorInfo' => 'token_invalid'], $e->getStatusCode());
        } 
        catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['errorInfo' => 'token_absent'], $e->getStatusCode());
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json(['errorInfo'=> $ex]);
        }
        $cont_acc = $request->only('cont_acc');
        if(empty($cont_acc)){
            return response()->json(['error' => 'parameters missing']);
        }
        $id = $user->id;
        User::where('id',$id)->update(['cont_acc' => $cont_acc['cont_acc']]);
        $users = User::where('cont_acc',$cont_acc)->limit(1)->get();
        $users[0]->id; 
        $name = $users[0]->name; 
        $email = $users[0]->email; 
        $cont_acc = $users[0]->cont_acc; 
        $phone = $users[0]->phone;
        $data = \DB::table('user_details')->where('cont_acc',$cont_acc)->limit(1)->get();
        $cons_acc = $data[0]->cons_acc;

        return response()->json([
                'id'=>$id,
                'name' => $name,
                'email' => $email,
                'cont_acc' => $cont_acc,
                'phone' => $phone,
                'cons_acc' => $cons_acc,
            ]);
    }

}
