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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Auth::routes();

});
Route::get('/home', 'HomeController@index')->name('home');

//user
Route::get('/', 'PagesController@index');
Route::get('/about-us', 'PagesController@about');
Route::get('/packages', 'PagesController@package');
Route::get('/contact-us', 'PagesController@contact');