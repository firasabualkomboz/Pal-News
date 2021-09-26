<?php

use App\Http\Controllers\Api\NewsApiController;
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

Auth::routes(['register' => false]);

Route::get('/', function () {

    return "this is test" ;

});

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
            Route::resource('/tags',\App\Http\Controllers\Admin\TagsController::class);
            Route::resource('/articles',\App\Http\Controllers\Admin\ArticlesController::class);

            Route::resource('/api/news', NewsApiController::class);


            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


            Route::resource('roles','\App\Http\Controllers\Admin\RolesController');
            Route::resource('users','\App\Http\Controllers\Admin\UsersController');



        });

});

