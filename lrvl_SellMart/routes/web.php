<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TanamanController;

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
Route::get('addcart/{id}', [TanamanController::class, 'addcart']);
Route::get('deletecart/{id}/{index}', [TanamanController::class, 'deletecart']);
Route::get('chart', [TanamanController::class, 'viewcart']);
Route::post('savecart', [TanamanController::class, 'savecart']);
Route::get('clearcart', [TanamanController::class, 'clearcart']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register-process', [AuthController::class, 'register_process'])->name('register-process');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-process', [AuthController::class, 'login_process'])->name('login-process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('index', [AuthController::class, 'index'])->name('index');
Route::get('tanaman', [TanamanController::class, 'index']);

Route::get('profile', [AuthController::class, 'profile']);
Route::get('editprofile', [AuthController::class, 'editprofile']);
