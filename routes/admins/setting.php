<?php

// Settings
Route::prefix('settings')->group(function () {
    Route::get('/', [
        'as' => 'settings.index',
        'uses' => 'AdminSettingController@index',
//        'middleware' => 'can:setting-list'
    ]);

    Route::get('/create', [
        'as' => 'settings.create',
        'uses' => 'AdminSettingController@create',
//        'middleware' => 'can:setting-add'
    ]);
    Route::post('/store', [
        'as' => 'settings.store',
        'uses' => 'AdminSettingController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'settings.edit',
        'uses' => 'AdminSettingController@edit',
//        'middleware' => 'can:setting-edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'settings.update',
        'uses' => 'AdminSettingController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'settings.delete',
        'uses' => 'AdminSettingController@delete',
//        'middleware' => 'can:setting-delete'
    ]);


});
