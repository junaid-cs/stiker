<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\ordercontroller;
use App\Http\Controllers\frontendcontroller;
use App\Http\Controllers\permissioncontroller;
use App\Http\Controllers\rolecontroller;
use App\Http\Livewire\AllProducts;
use App\Http\Livewire\ProductDetail;
use App\Http\Controllers\StripePaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[frontendcontroller::class,'index']);

Auth::routes();

Route::get('/home', [frontendcontroller::class,'index'])->name('home');
route::middleware(['auth','isAdmin'])->group(function(){
Route::get('index',[dashboardcontroller::class,'index'])->name('index');


// banner
Route::get('Banner',[dashboardcontroller::class,'banner'])->name('Banner');
Route::post('Banner/Store',[dashboardcontroller::class,'bannerstore'])->name('Banner.Store');
Route::get('Banneredit/{id}',[dashboardcontroller::class,'banneredit'])->name('Banneredit');
Route::post('Banner/Update',[dashboardcontroller::class,'bannerupdate'])->name('Banner.Update');
Route::get('Banner/Delete/{id}',[dashboardcontroller::class,'bannerdelete'])->name('Banner.Delete');

// banner
// adminroutes
Route::get('admin',[admincontroller::class,'index'])->name('admin');
Route::post('storeadmin',[admincontroller::class,'storeadmin'])->name('storeadmin');
Route::get('editadmin/{id}',[admincontroller::class,'editadmin'])->name('editadmin');
Route::post('updateadmin',[admincontroller::class,'updateadmin'])->name('updateadmin');

Route::get('deleteadmin/{id}',[admincontroller::class,'deleteadmin'])->name('deleteadmin');


// permission routes
Route::get('permissions',[permissioncontroller::class,'index'])->name('permissions');
Route::post('storepermission',[permissioncontroller::class,'storepermissions'])->name('storepermission');
Route::get('editpermission/{id}',[permissioncontroller::class,'editpermissions'])->name('editpermission');
Route::post('updatepermission',[permissioncontroller::class,'updatepermissions'])->name('updatepermission');
Route::get('deletepermission/{id}',[permissioncontroller::class,'deletepermissions'])->name('deletepermission');


// Role routes
Route::get('role',[rolecontroller::class,'index'])->name('role');
Route::post('storerole',[rolecontroller::class,'storeroles'])->name('storerole');
Route::get('editrole/{id}',[rolecontroller::class,'editroles'])->name('editrole');
Route::post('updaterole',[rolecontroller::class,'updateroles'])->name('updaterole');
Route::get('deleterole/{id}',[rolecontroller::class,'deleteroles'])->name('deleterole');
Route::post('storerolepermissions',[rolecontroller::class,'rolehavepermissions'])->name('storerolepermissions');
Route::get('accesscontrol/{id}',[rolecontroller::class,'accesscontrols'])->name('accesscontrol');
Route::get('deleteassignpermission/{id}/{role_id}',[rolecontroller::class,'deleteassigns'])->name('deleteassignpermission');


// userroutes
Route::get('user',[usercontroller::class,'index'])->name('user');
Route::post('storeuser',[usercontroller::class,'storeuser'])->name('storeuser');
Route::get('edituser/{id}',[usercontroller::class,'edituser'])->name('edituser');
Route::post('updateuser',[usercontroller::class,'updateuser'])->name('updateuser');
Route::get('deleteuser/{id}',[usercontroller::class,'deleteuser'])->name('deleteuser');


// Category 

Route::get('category',[categorycontroller::class,'index'])->name('category');
Route::post('storecategory',[categorycontroller::class,'storecategory'])->name('storecategory');
Route::get('editcategory/{id}',[categorycontroller::class,'editcategory'])->name('editcategory');
Route::post('updatecategory',[categorycontroller::class,'updatecategory'])->name('updatecategory');
Route::get('deletecategory/{id}',[categorycontroller::class,'deletecategory'])->name('deletecategory');


// sub category 

Route::get('subcategory',[categorycontroller::class,'subcategory'])->name('subcategory');
Route::post('storesubcategory',[categorycontroller::class,'storesubcategory'])->name('storesubcategory');
Route::get('editsubcategory/{id}',[categorycontroller::class,'editsubcategory'])->name('editsubcategory');
Route::post('updatesubcategory',[categorycontroller::class,'updatesubcategory'])->name('updatesubcategory');
Route::get('deletesubcategory/{id}',[categorycontroller::class,'deletesubcategory'])->name('deletesubcategory');

// products routes 

Route::get('products',[productcontroller::class,'index'])->name('products');
Route::post('storeproduct',[productcontroller::class,'storeproduct'])->name('storeproduct');
Route::get('fatchsubcat/{cat}',[productcontroller::class,'fatchsubcat'])->name('fatchsubcat');

Route::get('editproduct/{id}',[productcontroller::class,'editproduct'])->name('editproduct');
Route::post('updateproduct',[productcontroller::class,'updateproduct'])->name('updateproduct');
Route::get('deleteproduct/{id}',[productcontroller::class,'deleteproduct'])->name('deleteproduct');

// orders routes 

Route::get('orderview',[ordercontroller::class,'index'])->name('orderview');
Route::get('deleteorder/{id}',[ordercontroller::class,'deleteorders'])->name('deleteorder');
Route::get('confirmOrder/{id}',[ordercontroller::class,'confirmOrders'])->name('confirmOrder');

// order view print page
Route::get('orderlistview/{id}',[ordercontroller::class,'listorderview'])->name('orderlistview');
Route::get('printpage/{id}',[ordercontroller::class,'print'])->name('printpage');

// sub order routes 

Route::get('sub_order',[ordercontroller::class,'suborder'])->name('sub_order');
Route::get('deletesub_order/{id}',[ordercontroller::class,'deletesuborder'])->name('deletesub_order');
Route::get('confirmsuborder/{id}',[ordercontroller::class,'confirmsuborders'])->name('confirmsuborder');

// contact us routes 

Route::get('view_contact',[dashboardcontroller::class,'viewcontact'])->name('view_contact');



});

Route::get('home_page',[frontendcontroller::class,'index'])->name('home_page');
Route::get('detail_page/{id}',[frontendcontroller::class,'detailpage'])->name('detail_page');
Route::get('products_page',[frontendcontroller::class,'products'])->name('products_page');
Route::get('category_all_products/{category}',[frontendcontroller::class,'category_all_product'])->name('category_all_products');
Route::get('subcategory_all_products/{subcategory}',[frontendcontroller::class,'subcategory_all_product'])->name('subcategory_all_products');

Route::get('contact_us',[frontendcontroller::class,'contactpage'])->name('contact_us');
Route::post('store_contact_msg',[frontendcontroller::class,'contactusstore'])->name('store_contact_msg');
// cart page outes
Route::get('cartpage',[frontendcontroller::class,'cart'])->name('cartpage');

// complete page
Route::get('orderslist',[frontendcontroller::class,'orderlisting'])->name('orderslist');

Route::get('complete_orders/{id}',[frontendcontroller::class,'completeorder'])->name('complete_orders');

// order
Route::post('storeorder',[frontendcontroller::class,'Store_order'])->name('storeorder');

// team and condition page
Route::get('Terms',[frontendcontroller::class,'term'])->name('Terms');
// Privacy page
Route::get('Privacy',[frontendcontroller::class,'privacy'])->name('Privacy');

// Refund page
Route::get('Refund',[frontendcontroller::class,'refund'])->name('Refund');

// Notice page
Route::get('Notice',[frontendcontroller::class,'notice'])->name('Notice');

// rating
Route::post('rating',[frontendcontroller::class,'rating'])->name('rating');

// search
Route::get('search',[frontendcontroller::class,'search'])->name('search');
// stripe payment
Route::post('stripe',[StripePaymentController::class,'stripePost'])->name('stripe');

// about us page
Route::get('aboutus',[frontendcontroller::class,'aboutpage'])->name('aboutus');

// user login
Route::post('userlogin',[frontendcontroller::class,'userlogin'])->name('userlogin');

// Route::get('/product-detail/{id}', [ProductDetail::class,'render'])->name('product.detail');