<?php

// Slider
Route::prefix('slider')->group(function () {
    Route::get('/', [
        'as' => 'slider.index',
        'uses' => 'SliderAdminController@index',
//        'middleware' => 'can:slider-list'
    ]);

    Route::get('/create', [
        'as' => 'slider.create',
        'uses' => 'SliderAdminController@create',
//        'middleware' => 'can:slider-add'
    ]);

    Route::post('/store', [
        'as' => 'slider.store',
        'uses' => 'SliderAdminController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'slider.edit',
        'uses' => 'SliderAdminController@edit',
//        'middleware' => 'can:slider-edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'slider.update',
        'uses' => 'SliderAdminController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'slider.delete',
        'uses' => 'SliderAdminController@delete',
//        'middleware' => 'can:slider-delete'
    ]);
});
