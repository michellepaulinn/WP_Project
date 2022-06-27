<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\VerifyLogin;
use App\Http\Middleware\VerifyLogout;

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
Route::get('/item/{id}',[ItemController::class, 'itemDetail']);


Route::middleware([VerifyLogout::class])->group(function() {
    // kalau belum login, dapat akses route ke:
    Route::get('/login', [LoginController::class, 'form']);
    Route::post('/login-process', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'form']);
    Route::post('/register-process', [RegisterController::class, 'register']);
});

Route::middleware([VerifyLogin::class])->group(function() {
    // kalau sudah login, dapat akses route ke:
    Route::get('/logout', [LoginController::class, 'logout']);
    //Frontend
    Route::get('manage-item', [ItemController::class, 'view_update']);
    Route::get('add-item', [ItemController::class, 'view_create']);
    Route::get('transaction/{id}', [TransactionController::class, 'view_transaction']);
    //Backend
    Route::post('create-item',[ItemController::class,'create_item']);
    Route::post('/confirm-payment/{id}',[TransactionController::class, 'confirm_payment']);

    Route::get('/cart', [CartController::class, 'viewCart']);
});


