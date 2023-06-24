<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/test', function (){
  return "Working";
});


Route::group(['prefix'=>'carrot-project/', 'namespace'=>'App\Http\Controllers'], function () {

  Route::group(['prefix'=>'restaurants/'], function () {
    Route::get('all/', function () {
      return 'Restaurant Working!';
    });
  });

  Route::group(['prefix'=>'menu/'], function () {
    Route::get('menu-items/', function () {
      return 'Menu Working!';
    });
  });

  Route::group(['prefix'=>'orders/'], function () {
    Route::get('all-orders/', function () {
      return 'Order Working!';
    });
  });

  Route::group(['prefix'=>'users/'], function () {
    Route::get('get', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('get/{user}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('create', [\App\Http\Controllers\UserController::class, 'create']);
    Route::put('update/{user}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('delete/{user}', [\App\Http\Controllers\UserController::class, 'delete']);
  });

  Route::group(['prefix'=>'roles/'], function () {
    Route::get('get/', [\App\Http\Controllers\UserRoleController::class, 'index']);
    Route::get('get/{role}', [\App\Http\Controllers\UserRoleController::class, 'show']);
    Route::post('create', [\App\Http\Controllers\UserRoleController::class, 'create']);
    Route::put('update/{role}', [\App\Http\Controllers\UserRoleController::class, 'update']);
    Route::delete('delete/{role}', [\App\Http\Controllers\UserRoleController::class, 'delete']);
  });

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
