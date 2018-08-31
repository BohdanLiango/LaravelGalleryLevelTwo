<?php

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




Route::middleware(['guest', 'admin'])->group(function () {

    Route::get('/home', 'HomeController@index');

});


Route::prefix('gallery')->group(function () {

    Route::get('/', 'ImagesController@index');

    Route::get('/show/{id}', 'ImagesController@show');

});

Auth::routes();


Route::prefix('profile')->group(function () {

    Route::get('/', 'UsersController@index');

    Route::get('/panel', 'UsersController@panel');

    Route::get('/exit', 'UsersController@logOut');

    Route::get('/create', 'ImagesController@create');

    Route::post('/store', 'ImagesController@store');

    Route::get('/show/{id}', 'ImagesController@show');

    Route::get('/edit/{id}', 'ImagesController@edit');

    Route::post('/update/{id}', 'ImagesController@update');

    Route::get('/delete/{id}', 'ImagesController@delete');
});


Route::get('/', 'HomeController@index');


Route::get('/contact', 'HomeController@contact');

