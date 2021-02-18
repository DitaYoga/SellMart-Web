<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

//user//
Route::group(['middleware' => ['auth', 'CheckLevel:user']], function(){
    Route::get('/', [UserController::class, 'index']);
});

//admin//
Route::group(['middleware' => ['auth', 'CheckLevel:admin']], function(){
    Route::get('dashboard', [AdminController::class, 'index']);
});

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register-process', [AuthController::class, 'register_process'])->name('register-process');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-process', [AuthController::class, 'login_process'])->name('login-process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
