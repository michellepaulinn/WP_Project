<?php

use App\Http\Middleware\VerifyLogin;
use App\Http\Middleware\VerifyLogout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ImageSliderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;

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

// baik sudah login maupun belum login, dapat akses route ke:
Route::get('/', [PageController::class, 'homepage']);
Route::get('/search', [ItemController::class, 'searchItem']);
Route::get('/item/{slug}', [ItemController::class, 'itemDetail']);
Route::get('/category/{slug}', [ItemController::class, 'getCategory']);


Route::middleware([VerifyLogout::class])->group(function () {
    // kalau belum login, dapat akses route ke:
    Route::get('/login', [LoginController::class, 'form']);
    Route::post('/login-process', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'form']);
    Route::post('/register-process', [RegisterController::class, 'register']);
});

Route::middleware([VerifyLogin::class])->group(function () {
    // kalau sudah login, dapat akses route ke:
    Route::get('/logout', [LoginController::class, 'logout']);
    //Middleware admin 
    //Item
    //Frontend
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/admin/view_create_item', [AdminController::class, 'view_create']);
        Route::get('/admin/view_update_item/{slug}', [AdminController::class, 'view_update']);
        Route::get('/admin/delete_item/{slug}', [AdminController::class, 'delete_item']);
        Route::get('/admin/orders', [TransactionController::class, 'order_list']);
    
        //buat view admin untuk 
        Route::get('/transaction/{id}', [TransactionController::class, 'view_transaction']);
    
        //admin edit carousel
        Route::get('/admin/view_slider_remove', [ImageSliderController::class, 'viewSliderRemove']);
        Route::post('/admin/slider_remove_process', [ImageSliderController::class, 'removeSlider']);
        Route::get('/admin/view_slider_add', [ImageSliderController::class, 'viewSliderAdd']);
        Route::post('/admin/slider_add_process', [ImageSliderController::class, 'addSlider']);
    
        //Backend
        Route::post('/admin/create_item', [AdminController::class, 'create_item']);
        Route::post('/admin/update_item/{id}', [AdminController::class, 'update_item']);
        Route::post('/confirm-payment/{id}', [TransactionController::class, 'confirm_payment']);
    });

    Route::get('/cart', [CartController::class, 'viewCart']);
    Route::post('/cart', [CartController::class, 'addToCart']);
    Route::post('/delete', [CartController::class, 'removeCart']);

    //for checkout
    Route::get('/checkout', [CheckoutController::class, 'viewCheckout']);
    Route::post('/proceed-checkout', [CheckoutController::class, 'checkOut']);
    Route::get('/proceed-payment/{id}', [CheckoutController::class, 'upload_payment']);
    // Route::post('/checkout/proceed-payment/{id}', [CheckoutController::class, 'upload_payment']);
    //for process upload
    //user upload
    Route::post('checkout/proceed-payment/uploads/{id}', [CheckoutController::class, 'process_upload_payment']);

    //untuk admin update status
    Route::post('/transaction/{id}/update',[TransactionController::class, 'update_trans']);
    //untuk user cancel order
    Route::post('/cancel/{id}',[TransactionController::class, 'cancel_trans']);
    Route::get('/orders', [TransactionController::class, 'order_list']);
    Route::get('/transaction/{id}', [TransactionController::class, 'order_detail']);
    // Route::post('/transaction/checkout/proceed-payment/{id}', [TransactionController::class, 'confirm_payment']);
});
