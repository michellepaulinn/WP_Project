<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'homepage']);

Route::get('/login', [LoginController::class, 'form']);
Route::post('/login-process', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'form']);
Route::post('/register-process', [RegisterController::class, 'register']);

    //Frontend
    Route::get('manage-item', [ItemController::class, 'view_update']);
    Route::get('add-item', [ItemController::class, 'view_create']);
    //Backend
    Route::post('create-item',[ItemController::class,'create_item']);

Route::get('/cart', [CartController::class, 'viewCart']);

Route::get('/search', [ItemController::class, 'searchItem']);
Route::get('/item/{id}',[ItemController::class, 'itemDetail']);
