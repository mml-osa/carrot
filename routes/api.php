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

Route::get('/test', function () {
  return "Working";
});


Route::group(['prefix' => 'carrot-project/', 'namespace' => 'App\Http\Controllers'], function () {

  Route::group(['prefix' => 'restaurants/'], function () {
    Route::get('get', [\App\Http\Controllers\RestaurantController::class, 'index']);
    Route::get('get/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'show']);
    Route::post('create', [\App\Http\Controllers\RestaurantController::class, 'create']);
    Route::put('update/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'update']);
    Route::delete('delete/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'delete']);

    //RESTAURANTS MENU ROUTES
    Route::get('menu/get', [\App\Http\Controllers\RestaurantMenuController::class, 'index']);
    Route::get('menu/get/{restaurant}', [\App\Http\Controllers\RestaurantMenuController::class, 'show']);
    Route::post('menu/create', [\App\Http\Controllers\RestaurantMenuController::class, 'create']);
    Route::put('menu/update/{restaurant}', [\App\Http\Controllers\RestaurantMenuController::class, 'update']);
    Route::delete('menu/delete/{restaurant}', [\App\Http\Controllers\RestaurantMenuController::class, 'delete']);

    //RESTAURANTS MENU CATEGORIES ROUTES
    Route::get('menu/categories/get', [\App\Http\Controllers\MenuItemCategoryController::class, 'index']);
    Route::get('menu/categories/get/{restaurant}', [\App\Http\Controllers\MenuItemCategoryController::class, 'show']);
    Route::post('menu/categories/create', [\App\Http\Controllers\MenuItemCategoryController::class, 'create']);
    Route::put('menu/categories/update/{restaurant}', [\App\Http\Controllers\MenuItemCategoryController::class, 'update']);
    Route::delete('menu/categories/delete/{restaurant}', [\App\Http\Controllers\MenuItemCategoryController::class, 'delete']);

    //RESTAURANTS MENU ITEMS ROUTES
    Route::get('menu/items/get', [\App\Http\Controllers\MenuItemController::class, 'index']);
    Route::get('menu/items/get/{restaurant}', [\App\Http\Controllers\MenuItemController::class, 'show']);
    Route::post('menu/items/create', [\App\Http\Controllers\MenuItemController::class, 'create']);
    Route::put('menu/items/update/{restaurant}', [\App\Http\Controllers\MenuItemController::class, 'update']);
    Route::delete('menu/items/delete/{restaurant}', [\App\Http\Controllers\MenuItemController::class, 'delete']);

    //RESTAURANTS MENU ITEMS ROUTES
    Route::get('menu/items/size/get', [\App\Http\Controllers\MenuItemSizeController::class, 'index']);
    Route::get('menu/items/size/get/{restaurant}', [\App\Http\Controllers\MenuItemSizeController::class, 'show']);
    Route::post('menu/items/size/create', [\App\Http\Controllers\MenuItemSizeController::class, 'create']);
    Route::put('menu/items/size/update/{restaurant}', [\App\Http\Controllers\MenuItemSizeController::class, 'update']);
    Route::delete('menu/items/size/delete/{restaurant}', [\App\Http\Controllers\MenuItemSizeController::class, 'delete']);
  });

  Route::group(['prefix' => 'orders/'], function () {
    Route::get('all-orders/', function () {
      return 'Order Working!';
    });
  });

  Route::group(['prefix' => 'users/'], function () {
    Route::get('get', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('get/{user}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('create', [\App\Http\Controllers\UserController::class, 'create']);
    Route::put('update/{user}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('delete/{user}', [\App\Http\Controllers\UserController::class, 'delete']);
  });

  Route::group(['prefix' => 'roles/'], function () {
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
