<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Guest;

class ApiAuthController extends Controller
{
    public function login(Request $request){
        $data = $request->only('email','password');
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
            $cont_acc = $user->cont_acc;
        }
        
        return response()->json(['id'=>$id,
                                'name' => $name,
                                'email' => $email,
                                'cont_acc' => $cont_acc,
                                'token' => $token,
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
        return response()->json(compact('user'));
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
    	$data=$request->only('name','email','password','cont_acc');
    	$data['password'] = bcrypt($data['password']);
    	$USER_DATA = Guest::where('cont_acc', $data['cont_acc'])->limit(1)->get();
        if(empty($USER_DATA)){
            return response()->json(['error' => 'Contract Account Number does not exist'], 401);
        }
        $user=\DB::table('users')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'cont_acc' => $data['cont_acc'],
            ]);
        if($user){
            return response()->json(['info' => 'user_registered'], 200);
        }
        else{
            return response()->json(['error' => 'credentials_exists'], 401);
        }
    }

}
