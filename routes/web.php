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

Route::get('/', 'PagesController@index');
Route::get('/pages/about', 'PagesController@about');
Route::get('/pages/services', 'PagesController@services');
Route::get('/dashboard', 'DashboardController@index');

Route::resource('posts', 'PostsController');
Route::resource('library', 'LibraryController');


Auth::routes();
