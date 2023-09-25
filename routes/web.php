<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
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


//Auth
Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('register', [LoginController::class, 'register']);
Route::post('register', [LoginController::class, 'store'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register-confirm/{token}', [LoginController::class, 'confirmEmail'])->name('email.confirm');

Route::middleware(['auth'])->group(function () {
    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    //Users
    // Route::resource('users', UserController::class);
    // Route::resource('user-details', UserDetailController::class);

    //Orders
    Route::resource('orders', OrderController::class);
    
    //Products
    Route::resource('products', ProductController::class);
    Route::resource('types', TypeController::class);
    
    //Transactions
    Route::resource('transactions', TransactionController::class);
});



