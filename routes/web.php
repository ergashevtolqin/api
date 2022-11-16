<?php

use App\Http\Controllers\ProductController;
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
Route::get('product/{id}', [ProductController::class,'index'])->name('product');
Route::post('product/{id}', [ProductController::class,'create'])->name('product.create');
Route::post('smena-create/{id}', [ProductController::class,'smenaCreate'])->name('smena.create');
Route::post('smena-store/{id}', [ProductController::class,'smenaStore'])->name('smena.store');
Route::get('smena/{id}', [ProductController::class,'smena'])->name('smena');
Route::get('check/{id}/user/{user_id?}', [ProductController::class,'check'])->name('check');

//Route::get('product/{id}', [ProductController::class,'index'])->name('product');
