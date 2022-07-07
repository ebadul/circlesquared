<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ProjectSettingController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TestCaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'auth:api'],function(){
 
    Route::get('roles/{id?}',[RoleController::class,'index']);
    Route::post('roles/create',[RoleController::class,'create']);
    Route::post('roles/edit',[RoleController::class,'edit']);
    Route::get('roles/delete/{id}',[RoleController::class,'destroy']);
    
});


Route::group(['prefix'=>'user'],function(){
    Route::post('register',[AuthController::class,'create']);
    Route::post('login',[AuthController::class,'login']);
     
    Route::group(['middleware'=>'auth:api'],function(){
        
        Route::get('user',[AuthController::class,'user']);
        Route::post('logout',[AuthController::class,'logout']);
 
    });//end auth:api

});//end group user


Route::group(['middleware'=>'auth:api'],function(){

    Route::group(['prefix'=>'projects'],function(){
        
        Route::post('create',[ProjectController::class,'create']);
        Route::get('/',[ProjectController::class,'index']);
        Route::get('/{id}',[ProjectController::class,'projects']);
        Route::post('edit/{id}',[ProjectController::class,'edit']);
        Route::delete('delete/{id}',[ProjectController::class,'delete']);
        
        Route::get('settings/{project_id}',[ProjectSettingController::class,'index']);
        Route::post('settings/create',[ProjectSettingController::class,'create']);
        Route::post('settings/update',[ProjectSettingController::class,'update']);
        Route::post('settings/icon/store',[ProjectSettingController::class,'iconStore']);
        Route::get('/{project_id}/settings/icon/remove',[ProjectSettingController::class,'iconRemove']);

        Route::get('testcases',[TestCaseController::class,'index']);
        Route::post('testcases/create',[TestCaseController::class,'create']);       
    });//end group projects

    Route::group(['prefix'=>'testcases'],function(){
        
        Route::get('/{project_id}',[TestCaseController::class,'index']);
        Route::post('create',[TestCaseController::class,'create']); 
        Route::get('/get/{testcase_id}',[TestCaseController::class,'getDetails']);
        Route::post('/edit/{testcase_id}',[TestCaseController::class,'editTestcase']);
        Route::get('/delete/{testcase_id}',[TestCaseController::class,'deleteTestcase']);
        Route::post('/status/update',[TestCaseController::class,'updateStatus']);

    });//end group projects


});//end auth:api




