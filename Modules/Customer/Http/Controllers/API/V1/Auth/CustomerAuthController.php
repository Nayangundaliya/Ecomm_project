<?php

namespace Modules\Customer\Http\Controllers\API\V1\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CustomerAuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name'=>'required',
            "last_name"=>'required',
            "country"=>'required',
            "phone_no"=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
 
        if ($validator->fails()) {
             return response([
                        'message' => $validator->messages(),
                        'status'=>'Failed'
                    ], 401);
        }  

        if(Customer::where('email', $request->email)->first()){
            return response([
                'message' => 'Email already exists',
                'status'=>'failed'
            ], 200);
        }

        $customer = Customer::create([
            'first_name'=>$request->first_name,
            "last_name"=>$request->last_name,
            "country"=>$request->country,
            "city"=>$request->city,
            "phone_no"=>$request->phone_no,
            "email"=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
         $token = $customer->createToken($request->email)->plainTextToken;
        return response([
             'token'=>$token,
            'message' => 'Registration Success',
            'status'=>'success'
        ], 201);
    }


    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required',
        ]);
 
        if ($validator->fails()) {
             return response([
                        'message' => $validator->messages(),
                        'status'=>'Failed'
                    ], 401);
        }  
    
        $customer = Customer::where('email', $request->email)->first();
        if($customer && Hash::check($request->password, $customer->password)){
            $token = $customer->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'message' => 'Login Success',
                'status'=>'success'
            ], 200);
        }
        return response([
            'message' => 'The Provided Credentials are incorrect',
            'status'=>'failed'
        ], 401);
    }

    public function logout(Request $request){

         $tokenId = \Str::before(request()->bearerToken(), '|');
        // $customer = new Customer;
         DB::table('personal_access_tokens')->where('id',  $tokenId)->delete();
       // $customer->tokens()->where('id', $tokenId)->delete();
        return response([
            'message' =>  "logout",
            'status'=>'success'
        ], 200);
        
    }

}