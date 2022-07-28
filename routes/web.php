<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\TestCaseController;
use App\Http\Controllers\Web\TestSuiteController;

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
    Route::get('/project-details/{project_id}', [ProjectController::class,'projectsDetails'])->name('projects.details');
    Route::get('/delete-project/{project_id}', [ProjectController::class,'deleteProject'])->name('project.delete');
    Route::get('/add-project', [ProjectController::class,'addProject'])->name('projects.add');
    Route::post('/project-store', [ProjectController::class,'addProjectStore'])->name('projects.store');
    
    Route::get('/testcases', [TestCaseController::class,'testcasesList'])->name('testcases.list');
    Route::get('/add-testcases/{project_id}', [TestCaseController::class,'addTestcases'])->name('testcases.add');
    Route::post('/testcases-store', [TestCaseController::class,'addTestcasesStore'])->name('testcases.store');
    Route::get('/delete-testcases/{testcase_id}', [TestCaseController::class,'deleteTestcases'])->name('testcases.delete');
    Route::get('/details-testcases/{testcase_id}', [TestCaseController::class,'detailsTestcases'])->name('testcases.details');
    Route::get('/projects/testcases/edit/{testcase_id}', [TestCaseController::class,'editTestcases'])->name('testcases.edit');
    Route::get('/projects/testcases/copy/{testcase_id}', [TestCaseController::class,'copyTestcases'])->name('testcases.copy');
    Route::post('/edit-testcases-store', [TestCaseController::class,'editTestcasesStore'])->name('testcases.edit.store');

    Route::get('/testsuites', [TestSuiteController::class,'testsuitesList'])->name('testsuites.list');
    Route::get('/add-testsuites/{project_id}', [TestSuiteController::class,'addTestsuites'])->name('testsuites.add');
    Route::get('/projects/testsuites/edit/{testsuite_id}', [TestSuiteController::class,'editTestsuites'])->name('testsuites.edit');
    Route::get('/projects/testsuites/copy/{testsuite_id}', [TestSuiteController::class,'copyTestsuites'])->name('testsuites.copy');
    Route::post('/projects/testsuites/edit/store/{testsuite_id}', [TestSuiteController::class,'editTestsuitesStore'])->name('testsuites.edit.store');
    Route::get('/delete-testsuites/{testsuite_id}', [TestSuiteController::class,'deleteTestsuites'])->name('testsuites.delete');
    Route::post('/testsuites-store', [TestSuiteController::class,'addTestsuitesStore'])->name('testsuites.store');

});
