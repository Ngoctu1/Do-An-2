<?php
use App\Http\Controllers\login\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


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
Route::group(['namespace'=>'login'], function(){
    Route::group(['prefix'=>'loginctrl'], function(){
        Route::get('/login',[loginController::class,'getlogin']);
    });
});

Route::post('/sinupf',[loginController::class,'signup']) -> name('users.signup');


//---------------User----------------
Route::get('/', function () {
    return view('users/modun-user/home');
})-> name('users.home');

 Route::get('/login', function () {
     return view('users/login');
}) -> name('users.login');

Route::get('/signup', function () {
    return view('users/register');
}) -> name('users.register');

Route::get('/productdetail', function () {
    return view('users/modun-user/productdetail');
}) -> name('users.productdetail');
Route::get('/product', function () {
    return view('users/modun-user/product');
}) -> name('users.product');

//-------------------ADMIN------------------------
Route::get('/admin/account/modify/{id}',[AdminController::class,'modify']) -> name('account.detail');
Route::get('/admin/account/delete/{id}',[AdminController::class,'delete']) -> name('account.delete');
Route::post('/admin/account/edit/{id}',[AdminController::class,'edit']) -> name('account.edit');
Route::post('/admin/account/img/{id}',[AdminController::class,'image']) -> name('account.image');

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