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
    Route::get('/add-new-package', 'HomeController@new_package')->name('new-package');
    Route::post('/add-new-package', 'HomeController@create_new_package')->name('create_new_package');
    Route::get('/view-packages', 'HomeController@view_packages')->name('view_packages');
    Route::get('/edit-package/{id}', 'HomeController@edit_package')->name('edit_package');
    Route::put('/edit-package/{id}', 'HomeController@edit_final')->name('edit_final');
    Route::get('/home', 'HomeController@index')->name('home');
});

//user
Route::get('/', 'PagesController@index')->name('index');
Route::get('/about-us', 'PagesController@about');
Route::get('/packages', 'PagesController@package')->name('packages');
Route::get('/contact-us', 'PagesController@contact')->name('contact');