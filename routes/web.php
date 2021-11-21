<?php

use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Auth::routes(['register' => true]);

Route::get('/',[HomeController::class,'index']);

Route::get('/admin', function () {
    toast('Success Toast', 'Success Message');
    return view('layouts.admin');
});


Route::group([], function (){

    Route::prefix('admin')
        ->middleware('auth')
        ->name('admin.')
        ->group(function (){


            Route::get('/', function () {return view('admin.index');});

            Route::resource('/categories',\App\Http\Controllers\Admin\CategoriesController::class);
            Route::resource('/articles',\App\Http\Controllers\Admin\ArticlesController::class);

            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


        });

});

