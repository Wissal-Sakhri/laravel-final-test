<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;

//use Auth;

class AuthController extends Controller
{
    //private $token_name = "tokenname";

    public function login(Request $request)
    {
        $fields =[

            'email_admin' => 'required|email_admin|unique:ecommerce_admins,email',

            'password_admin' => 'required|same:confirm-password',


        ];
        //$input = $request->all();


        $input = $request->only('email_admin', 'password_admin');

        $validator=Validator::make($input,$fields);
        $token = Auth::guard('admin-api')->attempt($input);
        // dd($token);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard('admin-api')->user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

        //$token = Auth::attempt($credentials);
        //$admin =Admin::where("email_admin",$input["email_admin"])->first();

       /* $admin =Admin::where("email_admin",$input["email_admin"])->first();
        $admin=json_decode($admin, true);
        dd($admin);



        $admin = json_decode($admin, true);
        dd($admin);
        //dd($token);
        /*if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        //$user = Auth::admin();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);*/
            /*if ($admin && Hash::check($request->password_admin, $admin['password_admin'])) {
                $admin->tokens()->where('tokenable_id', $admin->admin_id)->delete();

                $token = $admin->createToken($this->token_name)->plainTextToken;
                dd($token);
                $admin["password_admin"] = null;
                return Response([
                    "token" => $token,
                    "admin" => $admin,
                ]);        }
                if(!$admin ){
                    return Response(["message" => "invalide credentials"],401);
                }*/


    }


    /*public function login(Request $request){
        $fields = $request->validate([
            "email_admin" => "required|string",
            "password_admin" => "required|string"
        ]);
        //$fields['password_admin'] = Hash::make($fields['password_admin']);

        //$password=Hash::make($fields["password_admin"]);
        // $user = Auth::attempt(['email' => $email, 'password' => becrypt($fields["password"])]);
        //$admin = Admin::where("email_admin",'=',$fields["email_admin"])
                       //->where('password_admin','=',$fields['password_admin'])->first();
        //dd($admin);
        $admin =Admin::where("email_admin",'=',$fields["email_admin"])
                            ->first();
        if ($admin && Hash::check($request->password_admin, $admin->password_admin)) {
            $admin->tokens()->where('tokenable_id', $admin->admin_id)->delete();

            $token = $admin->createToken($this->token_name)->plainTextToken;
            $admin["password_admin"] = null;
            return Response([
                "token" => $token,
                "admin" => $admin,
            ]);        }


        if(!$admin ){
            return Response(["message" => "invalide credentials"],401);
        }



        $admin->tokens()->where('tokenable_id', $admin->admin_id)->delete();

        $token = $admin->createToken($this->token_name)->plainTextToken;
        $admin["password_admin"] = null;
        return Response([
            "token" => $token,
            "admin" => $admin,
        ]);
    }*/

    public function register(Request $request){
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
        $admin =Admin::create(
            array_merge(
                $validator->validated(),
                ['password_admin' => bcrypt($request->password_admin)]));

        $token = $admin->createToken($this->token_name)->plainTextToken;
        //$admin["password_admin"] = ;
        return Response([
            "token" => $token,
            "admin" => $admin
        ],201);
    }


    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /*public function logout(Request $request){
        $res = $request->user()->currentAccessToken()->delete();
        if($res == 1){
            return ["message" => "logout successfull"];
        }
        return Response(["message" => "something went wrong"],300);
    }/*

    /*public function logout (Request $request){
        $token =$request->hearders('auth_token');
        //dd($token); try
        if($token){
            JWTauth::setToken($token)->invalidate(); //logout
            return $this->returnSuccessMessage('logged out successfully');
        }else{
            $this->returnErrorMessage('SAME THING WENT WRONG');
        }
    }*/


}
