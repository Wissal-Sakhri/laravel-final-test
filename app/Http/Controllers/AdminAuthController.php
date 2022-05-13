<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Auth;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\jwt;
use App\Models\Admin;
use Exception;
class AdminAuthController extends Controller
{
    use GeneralTrait;


    public function login (Request $request){
        try {

            //validation

            $rules=[
                "email_admin"=>"required|exists:ecommerce_admins,email_admin",
                "password_admin"=>"required"
            ];
            //$this->admin();
            $validator =Validator::make($request->all(),$rules);
            if($validator->fails()) {
                return $this->returnValidationError($validator);
            }
             //login

            //$credentials=$request->only(['email_admin','password_admin']);
            $credentials=[
                'email_admin' =>$request-> email_admin,
                'password'=>$request->password_admin

            ];
            //dd($credentials);
            $token=Auth::guard('admin-api')->attempt($credentials); //token if $credentials exists(api-admin->'provider' => 'ecommerce_admins'-->Adminnmodel-->ecommerceadmins)
            if(!$token)
                return $this->returnErrorMessage('incorrect credentials!');
            //generate token
            return $this-> returnDate('admin',$token);

        }catch (Exception $ex) {
            return $this->returnErrorMessage($ex->getMessage());
        }
    }


    /*public function login(Request $request){
            $validator = Validator::make($request->all(), [
                'email_admin' => 'required|email',
                'password' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            if (! $token = auth('admin-api')->attempt($validator->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->createNewToken($token);
        }*/


       /* public function login(Request $request)
        {
            $this->validate($request, [
                'email_admin' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email_admin', 'password');
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'error' => 'Invalid Credentials'
                    ], 401);
                }
            } catch (JWTException $e) {
                return response()->json([
                    'error' => 'Could not create token'
                ], 500);
            }
            return response()->json([
                'token' => $token
            ], 200);
        }*/

       



    public function logout (Request $request){
        $token =$request->hearder('auth_token');
        //dd($token); try
        if($token){
            JWTauth::setToken($token)->invalidate(); //logout
            return $this->returnSuccessMessage('logged out successfully');
        }else{
            $this->returnErrorMessage('SAME THING WENT WRONG');
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name_admin' => 'required|string|between:2,100',
            'email_admin' => 'required|string|email|max:100|unique:ecommerce_admins',
            'password_admin' => 'required|string|min:6',
            'phone_admin'=>'required',
            'address_admin'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $admin = Admin::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
        return response()->json([
            'message' => 'Admin successfully registered',
            'admin' => $admin
        ], 201);
    }
}
