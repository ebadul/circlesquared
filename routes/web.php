<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestCaseController;

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

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('login', [HomeController::class,'getLogin'])->name('login');
Route::post('login', [HomeController::class,'postLogin']);
Route::get('signup', [HomeController::class,'getSignup']);
Route::post('signup', [HomeController::class,'postSignup']);
Route::get('signup-success', [HomeController::class,'signupSuccess']);

Route::group(['middleware'=>'auth','prefix'=>'user'],function(){
    Route::get('/', [DashboardController::class,'index'])->name('user.dashboard');
    Route::get('/signout', [DashboardController::class,'signout'])->name('user.signout');
    Route::get('/projects', [ProjectController::class,'projectsList'])->name('projects.list');
    Route::get('/add-project', [ProjectController::class,'addProject'])->name('projects.add');
    Route::post('/project-store', [ProjectController::class,'addProjectStore'])->name('projects.store');
    
    Route::get('/testcases', [TestCaseController::class,'testcasesList'])->name('testcases.list');
    Route::get('/add-testcases', [TestCaseController::class,'addTestcases'])->name('testcases.add');
});
