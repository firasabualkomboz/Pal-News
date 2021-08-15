<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['register' => false]);

Route::get('/admin', function () {
    return view('layouts.admin');
});


Route::group([], function (){

    Route::prefix('admin')
        ->middleware('auth')
        ->name('admin.')
        ->group(function (){


            Route::get('/', function () {
                return view('admin.index');
            });

            Route::resource('/categories',\App\Http\Controllers\Admin\CategoriesController::class);
            Route::resource('/tags',\App\Http\Controllers\Admin\TagsController::class);
            Route::resource('/articles',\App\Http\Controllers\Admin\ArticlesController::class);



            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


            Route::group(['middleware' => ['auth']], function() {
                Route::resource('roles','\App\Http\Controllers\Admin\RolesController');
                Route::resource('users','\App\Http\Controllers\Admin\UsersController');
            });


        });

});

