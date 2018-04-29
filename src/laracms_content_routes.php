<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Content\Controllers',
    'prefix'     => 'laracms/content'
], function () {

    Route::get('/', 'ContentController@index')->name('laracms.content');
    Route::get('/create', 'ContentController@create')->name('laracms.content.create');
    Route::post('/create', 'ContentController@store');
    Route::get('/edit/{content}', 'ContentController@edit')->name('laracms.content.edit');
    Route::post('/edit/{content}', 'ContentController@update');
    Route::get('/delete/{content}', 'ContentController@destroy')->name('laracms.content.destroy');


    Route::group([
        'prefix'     => 'components'
    ], function () {

        Route::get('/', 'ComponentController@index')->name('laracms.content.component');
        Route::get('/create', 'ComponentController@create')->name('laracms.content.component.create');
        Route::post('/create', 'ComponentController@store');
        Route::get('/edit/{component}', 'ComponentController@edit')->name('laracms.content.component.edit');
        Route::post('/edit/{component}', 'ComponentController@update');
        Route::get('/delete/{component}', 'ComponentController@destroy')->name('laracms.content.component.destroy');

    });

});