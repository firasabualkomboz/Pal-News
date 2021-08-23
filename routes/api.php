<?php

use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['midleware' => 'auth:sanctum'] , function(){

    Route::apiResource('categories',\App\Http\Controllers\Api\CategoriesController::class);
    Route::apiResource('tags',\App\Http\Controllers\Api\TagsController::class);
    Route::apiResource('articles',\App\Http\Controllers\Api\ArticlesController::class);
    Route::apiResource('logout',\App\Http\Controllers\Api\LoginController::class);

});



Route::post('login',[LoginController::class, 'login']);
Route::post('register',[LoginController::class, 'register']);

Route::get('tokens',[LoginController::class, 'tokens']);
