<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Users
Route::resource('users', UserController::class);
Route::resource('user-details', UserDetailController::class);

//Products
Route::resource('products', ProductController::class);
Route::resource('types', TypeController::class);

//Transactions
Route::resource('transactions', TransactionController::class);
Route::resource('transaction-details', TransactionDetailController::class);
