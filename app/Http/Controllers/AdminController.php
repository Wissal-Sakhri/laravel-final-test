<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Auth;
class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$admin_id=optional(Auth::guard('admin-api')->user())->id;
        $admin_id=Auth::guard('admin-api')->id();
        //dd($admin_id);
        $admin=Admin::find($admin_id);
        return response()->json($admin);
        //dd($admin);
        //dd($admin->hasRole('SuperAdmin'));
        /*if($admin->hasRole('admin')){
            $admins=Admin::all();
            return response()->json($admins,200);
        }
       else{
           return response()->json(['msg'=>'not authorized!']);
       }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$admin_id=Auth::id();
        //dd($admin_id);
        //$admin=Admin::find($admin_id);
        //dd($admin);
        //if($admin->hasRole('SuperAdmin')){
            $validation =[

                'name_admin' => 'required',

                'email_admin' => 'required|email_admin|unique:ecommerce_admins,email',

                'password_admin' => 'required|same:confirm-password',

                'roles' => 'required'

            ];
            $input = $request->all();

            $validator=Validator::make($input,$validation);




            $input['password_admin'] = Hash::make($input['password_admin']);



            $admin = Admin::create($input);

            //$admin->assignRole($request->input('roles'));




            //$admin=Admin::create($request->all());
            return response()->json($admin,201);
        //}
       //else{
         //  return response()->json(['msg'=>'not authorized!']);
       //}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admin_id=Auth::guard('admin-api')->id();
        //dd($admin_id);
        $admin=Admin::find($admin_id);
        return response()->json($admin);

        //dd($admin);
       /* if($admin->hasRole('SuperAdmin')){
            return response()->json($admin);

        }
       else{
           return response()->json(['msg'=>'not authorized!']);
       }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $admin_id=Auth::guard('admin-api')->id();
        //dd($admin_id);
        $admin=Admin::find($admin_id);
        $validation=[

            'name_admin' => 'required',

            'email_admin' => 'required|email|unique:users,email,'.$admin['admin_id'],

            'password_admin' => 'same:confirm-password',

            'roles' => 'required'

        ];
        $input=$request->all();
        $validator=Validator::make($input,$validation);
            if(!empty($input['password_admin'])){

                $input['password_admin'] = Hash::make($input['password_admin']);

            }else{

                $input = Arr::except($input,array('password_admin'));

            }
        $admin->update($input);
            return response()->json($admin,200);

        //dd($admin);
        /*if($admin->hasRole('SuperAdmin')){
            $validation=[

                'name_admin' => 'required',

                'email_admin' => 'required|email|unique:users,email,'.$admin['admin_id'],

                'password_admin' => 'same:confirm-password',

                'roles' => 'required'

            ];
            $input=$request->all();

            $validator=Validator::make($input,$validation);
            if(!empty($input['password_admin'])){

                $input['password_admin'] = Hash::make($input['password_admin']);

            }else{

                $input = Arr::except($input,array('password_admin'));

            }
            /*$admin->update($input);
            DB::table('model_has_roles')->where('model_id',$admin['admin_id'])->delete();



            $admin->assignRole($request->input('roles'));



            return response()->json($admin,200);

        }
       else{
           return response()->json(['msg'=>'not authorized!']);
       }*/
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)

    {
        $admin_id=Auth::id();
        //dd($admin_id);
        $admin=Admin::find($admin_id);
        return response()->json(null,204);

        //dd($admin);
        /*if($admin->hasRole('SuperAdmin')){
            $admin->delete();
            return response()->json(null,204);
        }
       else{
           return response()->json(['msg'=>'not authorized!']);
       }*/

    }


}
