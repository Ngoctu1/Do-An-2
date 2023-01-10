<?php
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Function_;


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

//--------------login-------------------
//Route::get('/login', [loginController::class,'getlogin']) -> name('users.login');
//Route::post('/login', [loginController::class,'login']) -> name('users.login');


Auth::routes();
Route::post('/sinupf',[loginController::class,'signup']) -> name('users.signup');


//---------------User----------------
Route::get('/', function () {
    return view('users/modun-user/home');
})-> name('home');

Route::get('/signup', function () {
    return view('users/register');
}) -> name('users.register');

Route::get('/productdetail/{id}', [userController::class,'prd_detail']
) -> name('users.productdetail');
Route::get('/product', [userController::class,'product']) -> name('users.product');

//------------------------Cart---------------
Route::get('/cart', function () {
    return view('users/modun-user/cart');
}) -> name('users.cart');


Route::get('/payment', function () {
    return view('users/modun-user/payment');
}) -> name('users.payment');

Route::get('/add_cart/{id}',[userController::class,'addcart']) -> name('users.cart1');

Route::get('/cartshop', function () {
    return view('users/modun-user/cartshop');
}) -> name('users.cartshop');

Route::get('/pay',[CartController::class,'pay']) -> name('cart.pay');



Route::get('/cart/delete/{id}',[CartController::class,'deletecart']);
Route::get('/cart/plus/{id}',[CartController::class,'pluscart']) -> name('cart.plus');
Route::get('/cart/minus/{id}',[CartController::class,'minuscart'])-> name('cart.minus');


Route::post('/add_cart',[CartController::class,'addcart']) -> name('cart.add');


Route::get('/pay', function () {
    return view('users.modun-user.payment.payment');
})-> name('cart.minus');

Route::post('/admin/product/edit/{id}',[AdminController::class,'prd_edit']) -> name('admin.prd_edit');


Route::get('/checkout', [CheckoutController::class,'getCheckout'])->name('checkout.index');
Route::post('/checkout/order', [CheckoutController::class,'placeOrder'])->name('checkout.place.order');


//-------------------ADMIN------------------------

//---------------edit acc---
Route::get('/admin/account/modify/{id}',[AdminController::class,'modify']) -> name('account.detail');
Route::get('/admin/account/delete/{id}',[AdminController::class,'delete']) -> name('account.delete');
Route::post('/admin/account/edit/{id}',[AdminController::class,'edit']) -> name('account.edit');
Route::post('/admin/account/img/{id}',[AdminController::class,'image']) -> name('account.image');
//----------------edit prd------------
Route::get('/admin/product/modify/{id}',[AdminController::class,'prd_modify']) -> name('admin.prd_detail');
Route::post('/admin/product/edit/{id}',[AdminController::class,'prd_edit']) -> name('admin.prd_edit');
//---------------add prd-----------
Route::get('/admin/product/add',function () {
    return view('Admin/modun/addprd');
}) -> name('admin.addprd');
Route::post('/admin/product/add',[AdminController::class,'prd_add']) -> name('admin.prd_add');

Route::get('/admin/account',[AdminController::class,'account']) 
-> name('admin.account');
Route::get('/admin', function () {
    return view('Admin/modun/dashboard');
}) -> name('admin.dashboard');
Route::get('/admin/product', [AdminController::class,'product']
) -> name('admin.product');






// tr

//tu

// php artisan serve 1
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
