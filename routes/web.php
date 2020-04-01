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
//routes user
Route::get('/registerHoras' , 'UserController@horas')->name('horas');

// routes horas
Route::post('/saveHoras' , 'HoraController@create')->name('horas.save');
Route::get('/verHoras/{mes}' , 'userHorasController@getAll')->name('verHoras');

// routes posts
Route::get('/posts/store' , 'PostController@index')->name('storePost')->middleware('auth');
Route::post('/posts/create' , 'PostController@create')->name('createPost')->middleware('auth');
Route::get('/posts/get/{post}', 'PostController@GetPost')->name('post.image');
Route::get('/posts/show/{id}', 'PostController@show')->name('post.show');
Route::get('/posts/crud', 'PostController@showCrudPost')->name('post.crud')->middleware('auth');
Route::post('/posts/search' , 'PostController@search')->name('post.search')->middleware('auth');
Route::get('/posts/store/{id}' , 'PostController@store')->name('post.store')->middleware('auth');
Route::post('/posts/edit/{id}' , 'PostController@edit')->name('post.edit')->middleware('auth');
Route::get('/posts/delete/{id}', 'PostController@destroy')->name('post.delete')->middleware('auth');
// routes category
Route::get('/category/index/{id}', 'CategoryController@index')->name('category.index');