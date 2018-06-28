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

Route::get('/', 'WelcomeController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');



Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('upload', 'HomeController@upload')->name('upload');
        Route::get('home', 'HomeController@index')->name('home'); 
        Route::post('prof', 'ProfController@store')->name('prof.post');
        Route::get('edit', 'HomeController@edit')->name('prof.edit');
        Route::post('cafe', 'CafeController@upload')->name('cafe.post');
        Route::get('cafe-add', 'CafeController@cafe')->name('cafe.add');  
    });
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('cafe', 'CafeController@index')->name('cafe.get');
    Route::delete('cafe', 'CafeController@destroy')->name('cafe.destroy');
    Route::get('test', 'CafeController@test')->name('test');
    Route::get('megumi', 'HomeController@megumi')->name('megumi');
    Route::get('jitsu','HomeController@jitsu')->name('page.jitsu');
    Route::get('minami','HomeController@minami')->name('minami');
    
});
