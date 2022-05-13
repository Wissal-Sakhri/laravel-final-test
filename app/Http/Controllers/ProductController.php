<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Auth;
use Validator;
use App\Http\Controllers\AdminController;
class ProductController extends Controller
{
    function __construct()

    {


        $this->middleware('permission:listProduct|createProduct|editProduct|deleteProduct',['only' => ['index','show']] , 'auth:admin-api');

        $this->middleware('permission:createProduct', ['only' => ['create','store']],'auth:admin-api');

        $this->middleware('permission:editProduct', ['only' => ['edit','update']],'auth:admin-api');

        $this->middleware('permission:deleteProduct', ['only' => ['destroy']],'auth:admin-api');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$id = $request->User()->currentAccessToken()->tokenable->admin_id;
        //return Product::where('admin_id',$admin_id)->get();
        $products = Product::all();
        return response()->json($products,200);
        
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
        
        $validation=[

            'name_porduct'=>'required',
            'description_product'=>'required',
            'original_price_product'=>'required',
            'stock_item_product'=>'required',
            'thumbnail_product'=>'required',
            'status_product'=>'required',

        ];
        $input=$request->all();
        $validator=Validator::make($input,$validation);

        $product=Product::create($input);
        return response()->json($product,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return response()->json($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validation=[

            'name_porduct'=>'required',
            'description_product'=>'required',
            'original_price_product'=>'required',
            'stock_item_product'=>'required',
            'thumbnail_product'=>'required',
            'status_product'=>'required',

        ];
        $input=$request->all();
        $validator=Validator::make($input,$validation);
        $product->update($input);
        return response()->json($product,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null,204);


    }
}
