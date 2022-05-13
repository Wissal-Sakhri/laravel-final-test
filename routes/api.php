<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\StoreController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();
//,'checkAdminToken:admin-api' ->middleware(['checkAdminToken:admin-api']
Route::group(['middleware'=>['api','web',]],function(){
    Route::resource('ecommerce/admin', AdminController::class);
    Route::resource('ecommerce/store', StoreController::class);
    Route::post('ecommerce/admin/login',[AuthController::class,'login']);
    Route::post('ecommerce/admin/logout',[AuthController::class,'logout']);
    Route::post('ecommerce/register', [AuthController::class, 'register']);
    Route::resource('roles', RoleController::class);
    Route::resource('product', ProductController::class);




});
?>