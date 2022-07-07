<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class,'index']);
Route::get('login', [HomeController::class,'getLogin'])->name('login');
Route::post('login', [HomeController::class,'postLogin']);
Route::get('signup', [HomeController::class,'getSignup']);
Route::post('signup', [HomeController::class,'postSignup']);
Route::get('signup-success', [HomeController::class,'signupSuccess']);

Route::group(['middleware'=>'auth','prefix'=>'user'],function(){
    Route::get('/', [DashboardController::class,'index'])->name('user.dashboard');
});
