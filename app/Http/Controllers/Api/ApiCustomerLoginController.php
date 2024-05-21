<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ApiCustomerLoginController extends Controller
{
    public function register(Request $request){
        try{
        $validation = Validator::make($request->all(),[
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required','email:filter'],
            'password' => ['required'],
        ]);
        if($validation->fails()){
            return response()->json([
                'status' => 401,
                'message' => 'validation fails',
                'errors' => $validation->errors()->all(),

            ],401);
        }else{
            $user = Customer::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken("API TOKEN")->plainTextToken;
            return response()->json([
                'status' => 200,
                'message' => 'user created successfull',
                'token' => $token,
            ],200);
        }

        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ],500);
        }
    }


    public function login(Request $request){
        try{
            $validation = Validator::make($request->all(),[
                'email' => ['required'],
                'password' => ['required']
            ]);

            if($validation->fails()){
                return response()->json([
                    'status' => 401,
                    'message' => 'validation failed',
                    'errors' => $validation->errors(),
                ],401);
            }else{
                if(!Auth::guard('customer')->attempt($request->only(['email','password']))){
                return response()->json([
                    'status' => 401,
                    'message' => 'creadential not match',
                ],401);
                }else{
                    $user = User::where('email',$request->email)->first();
                    $token = $user->createToken("API TOKEN")->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'email' => $request->email,
                    'message' => 'login successfull',
                    'token' => $token,
                ],200);
                }

            }


        }catch(Throwable $th){
            return response()->json([
                'status' =>500,
                'message' => $th->getMessage(),
            ],500);
        }
    }
}
