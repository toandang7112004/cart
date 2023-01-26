<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductsController::class,'index']);
Route::get('cart', [ProductsController::class,'cart']);
Route::get('add-to-cart/{id}', [ProductsController::class,'addToCart'])->name('add-to-cart');
Route::patch('update-cart', [ProductsController::class,'update']);
Route::delete('remove-from-cart', [ProductsController::class,'remove']);
Route::delete('remove-from-cart', [ProductsController::class,'remove']);