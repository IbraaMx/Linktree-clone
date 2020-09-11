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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('/settings', 'UserController@edit')->name('user.settings');

    Route::put('/settings', 'UserController@update')->name('user.settings.update');

    Route::get('/', 'LinkController@index')->name('dashboard.index');

    Route::get('/new', 'LinkController@create')->name('dashboard.create');

    Route::post('/new', 'LinkController@store')->name('dashboard.store');

    Route::get('/{link}', 'LinkController@edit')->name('dashboard.edit');

    Route::put('/{link}', 'LinkController@update')->name('dashboard.update');

    Route::delete('/{link}', 'LinkController@destroy')->name('dashboard.destroy');

});



Route::get('/{user}', 'UserController@show');

