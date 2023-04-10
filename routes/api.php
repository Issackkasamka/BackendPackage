<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\ReceiverController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Register',[AuthController::class,'register']);
Route::post('/Login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::prefix('/sender')->group(function () {

        Route::get('/',[SenderController::class,'GetSenders']);
        Route::get('{id}',[SenderController::class,'GetSender']);
        Route::post('/',[SenderController::class,' Create']);
        Route::put('{id}',[SenderController::class,'Update']);
        Route::delete('{id}',[SenderController::class,'Delete']);
        Route::get('{name}',[SenderController::class,'Search']);

    });


    Route::prefix('/receiver')->group(function () {

        Route::get('/',[ReceiverController::class,'GetReceivers']);
        Route::get('{id}',[ReceiverController::class,'GetReceiver']);
        Route::get('{id}',[ReceiverController::class,'GetReceiverBySenderId']);
        Route::post('/',[ReceiverController::class,' Create']);
        Route::put('{id}',[ReceiverController::class,'Update']);
        Route::delete('{id}',[ReceiverController::class,'Delete']);
        Route::get('{name}',[ReceiverController::class,'Search']);

    });


    Route::prefix('/package')->group(function () {

        Route::get('/',[ReceiverController::class,'GetPackages']);
        Route::get('{id}',[ReceiverController::class,'GetPackage']);
        Route::get('{id}',[ReceiverController::class,'GetPackageBySenderId']);
        Route::post('/',[ReceiverController::class,' Create']);
        Route::put('{id}',[ReceiverController::class,'Update']);
        Route::delete('{id}',[ReceiverController::class,'Delete']);
        Route::get('{name}',[ReceiverController::class,'Search']);

    });


    Route::post('/Logout',[AuthController::class,'logout']);

});
