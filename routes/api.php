<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\apicontroller;
use App\Http\Controllers\UserApiController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
   
   
    // orders

    Route::post("orders",[apicontroller::class,'Store_order'])->name('orders');
    Route::post("all_orders",[apicontroller::class,'sub_order'])->name('all_orders');
    Route::get("completeorderdata",[apicontroller::class,'completeorder'])->name('completeorderdata');
    Route::get("completeorderproducts/{id}",[apicontroller::class,'completeorderproducts'])->name('completeorderproducts');

// user data routes

Route::get("userdata",[apicontroller::class,'getuserdata'])->name('userdata');
Route::post("updateuserdata",[apicontroller::class,'updateuser'])->name('updateuserdata');


// rating 
Route::post("productrating",[apicontroller::class,'rating'])->name('productrating');



    });

    Route::get('allproducts',[apicontroller::class,'allproducts'])->name('allproducts');

    Route::get('allproductrating',[apicontroller::class,'allproductratings'])->name('allproductrating');
    Route::get('allcategory',[apicontroller::class,'category'])->name('allcategory');

    Route::get('allsubcategory',[apicontroller::class,'allsubcategory'])->name('allsubcategory');
    Route::get('all_category_products',[apicontroller::class,'category_products'])->name('all_category_products');
    Route::get('allproducts_of_category/{category}',[apicontroller::class,'categoryproducts'])->name('allproducts_of_category');
    Route::get('get_subcategorys/{category}',[apicontroller::class,'get_subcategory'])->name('get_subcategorys');
    Route::get('get_products/{subcategory}',[apicontroller::class,'get_product'])->name('get_products');

Route::get("addtocart/{productid}/{productname}/{productprice}",[apicontroller::class,'storecart'])->name('addtocart');


Route::post("login",[UserApiController::class,'index']);
Route::post("registerapi",[UserApiController::class,'register'])->name('registerapi');
Route::post('forgetuserapi',[UserApiController::class,'forgetapi'])->name('forgetuserapi');
Route::post('updateuser_password',[UserApiController::class,'updatepassworc'])->name('updateuser_password');

//  main search api
Route::get("searchproducts",[apicontroller::class,'searchproduct'])->name('searchproducts');

// contact us
Route::post("contactusdata",[apicontroller::class,'contactusstore'])->name('contactusdata');
// rating

Route::get("get_rating/{productid}",[apicontroller::class,'getrating'])->name('get_rating');
//  notification update api
Route::get("update_notification/{id}",[apicontroller::class,'notification'])->name('update_notification');
