<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [ProductController::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::prefix('admin')->middleware('admin')->group(function () {    
    Route::resource('products', ProductAdminController::class);
});