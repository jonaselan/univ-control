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

Auth::routes();
Route::get('/block', 'HomeController@block');

Route::group(['middleware' => 'approved'], function () {
  Route::get('/home', 'HomeController@index')->name('home');
});

/* universities routes */
Route::group(['prefix' => 'universities', 'middleware' => 'approved', 'where' => ['id'=>'[0-9]+']], function () {
    Route::get('', 'UniversityController@index')->name('universities');
    Route::get('create', 'UniversityController@create')->name('universities.create');
    Route::post('', 'UniversityController@store')->name('universities.store');
    Route::get('edit/{id}', 'UniversityController@edit')->name('universities.edit');
    Route::put('{id}', 'UniversityController@update')->name('universities.update');
    Route::get('remove/{id}', 'UniversityController@destroy')->name('universities.destroy');
});

/* users routes */
Route::group(['prefix' => 'users', 'middleware' => 'approved', 'where' => ['id'=>'[0-9]+']], function () {
    Route::get('', 'UserController@index')->name('users');
    Route::get('{id}/approved', 'UserController@update')->name('approved');
    Route::get('{id}/denied', 'UserController@update')->name('denied');
});
