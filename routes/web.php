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



Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);
    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin'
    ]);

    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'AdminController@logout'
    ]);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
