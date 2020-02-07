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



Auth::routes();
Route::get('/', 'WelcomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registerHoras' , 'UserController@horas')->name('horas');
Route::post('/saveHoras' , 'HoraController@create')->name('horas.save');
Route::get('/verHoras/{mes}' , 'userHorasController@getAll')->name('verHoras');
Route::get('/posts/store' , 'PostController@index')->name('storePost')->middleware('auth');
Route::post('/posts/create' , 'PostController@create')->name('createPost')->middleware('auth');
Route::get('/posts/get/{post}', 'PostController@GetPost')->name('post.image');
Route::get('/posts/show/{id}', 'PostController@show')->name('post.show');
Route::get('/category/index/{id}', 'CategoryController@index')->name('category.index');