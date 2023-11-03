<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\DashboardLaundryController;


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
// start LaundryController
Route::get('/', [LaundryController::class,"index"]);

Route::get('/laundry', [LaundryController::class,"laundries"]);
Route::get('/laundry/{laundry}', [LaundryController::class,"laundry"]);

// end LaundryController


// start DashboardLaundryController
Route::resource('/dashboard/laundry', DashboardLaundryController::class)->middleware('auth');
// end DashboardLaundryController


// start UserController
Route::get('/register',[UserController::class,'register'])->middleware('guest');
Route::post( '/register', [UserController::class, 'store'])->name('register');

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post( '/login', [UserController::class, 'authenticate'])->name('auth');

Route::post('/logout',[UserController::class,'logout'])->name('logout');
// end UserController

