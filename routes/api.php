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

route::apiResource('categories',\App\Http\Controllers\Api\CategoriesController::class)->middleware('auth:sanctum');
route::apiResource('tags',\App\Http\Controllers\Api\TagsController::class)->middleware('auth:sanctum');
route::apiResource('articles',\App\Http\Controllers\Api\ArticlesController::class)->middleware('auth:sanctum');

Route::post('login',[LoginController::class, 'login']);
Route::get('tokens',[LoginController::class, 'tokens']);
