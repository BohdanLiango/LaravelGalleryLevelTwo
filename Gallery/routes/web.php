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


Route::get('/', 'HomeController@home');



Route::get('/contact', 'HomeController@contact');
Route::get('/panel', 'HomeController@panel');

Route::get('/gallery', 'ImagesController@index');


Route::prefix('images')->group(function(){


    Route::get('/create', 'ImagesController@create');

    Route::post('/store', 'ImagesController@store');

    Route::get('/show/{id}', 'ImagesController@show');

    Route::get('/edit/{id}','ImagesController@edit');

    Route::post('/update/{id}','ImagesController@update');

    Route::get('/delete/{id}','ImagesController@delete');

});


Route::middleware(['guest', 'admin'])->group(function (){

    Route::get('/home', 'HomeController@index');

});


