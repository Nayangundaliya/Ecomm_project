<?php

namespace Modules\Customer\Http\Controllers\Api\V1\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class CustomerAuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name'=>'required|string|min:3',
            "last_name"=>'required|string|min:2',
            "country"=>'required',
            "city"=>'required',
            "phone_no"=>'required|numeric',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
 
        if ($validator->fails()) {
             return response([
                        'message' => $validator->messages(),
                        'status_code'=> Response::HTTP_UNAUTHORIZED,
                    ]);
        }  

        if(Customer::where('email', $request->email)->first()){
            return response([
                'message' => 'Email already exists',
                'status_code'=> Response::HTTP_UNAUTHORIZED,
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
            'first_name' => $customer->first_name,
            'id' => $customer->id,
            "email" => $customer->email,
            'message' => 'Registration Success',
            'status_code'=> Response::HTTP_OK,
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
                        'status_code'=> Response::HTTP_UNAUTHORIZED,
                    ]);
        }  
    
        $customer = Customer::where('email', $request->email)->first();
        if($customer && Hash::check($request->password, $customer->password)){
            $token = $customer->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'first_name' => $customer->first_name,
                'id' => $customer->id,
                "email" => $customer->email,
                'message' => 'Login Success',
                'status_code'=> Response::HTTP_OK,
            ], 200);
        }else{
            return response([
            'message' => 'The Provided Credentials are incorrect',
            'status_code'=> Response::HTTP_UNAUTHORIZED,
        ]);
        }
        
    }
//
    public function logout(Request $request){

         $tokenId = \Str::before(request()->bearerToken(), '|');
       


        if($tokenId!=null){
            try {
               // $customer = new Customer;
                    DB::table('personal_access_tokens')->where('id',  $tokenId)->delete();
                // $customer->tokens()->where('id', $tokenId)->delete(); 
                    return response([
                        'message' =>  "Logout Success",
                        'status_code'=> Response::HTTP_OK,
                    ], 200);
            } 
            catch (\Exception $e) {
                
                return response()->json([
                    'status_code'=> Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=> $e->getMessage()
                ]);
            }
        }
        else{
            return response()->json([
                'status_code'=> Response::HTTP_UNAUTHORIZED,
                'message'=> 'Unauthorized'
            ]);
        }
        
        
    }

}