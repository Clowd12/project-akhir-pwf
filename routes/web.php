<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class,'register']);
Route::post( '/register', [UserController::class, 'store'])->name('register');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post( '/login', [UserController::class, 'authenticate'])->name('auth');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::resource('/dashboard/laundry', DashboardLaundryController::class);
