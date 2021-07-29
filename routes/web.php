<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',[ShoppingCartController::class,'create']);
Route::post('/create',[ShoppingCartController::class,'store']);
Route::get('/list',[ShoppingCartController::class,'list']);



Route::get('add',[ProductController::class,'add']);
Route::get('show',[ProductController::class,'show']);
Route::get('remove',[ProductController::class,'remove']);
