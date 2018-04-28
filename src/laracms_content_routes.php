<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Content\Controllers',
    'prefix'     => 'laracms/content/texts'
], function () {

    Route::get('/', 'TextController@index')->name('laracms.content.text');
    Route::get('/create', 'TextController@create')->name('laracms.content.text.create');
    Route::post('/create', 'TextController@store');
    Route::get('/edit/{content}', 'TextController@edit')->name('laracms.content.text.edit');
    Route::post('/edit/{content}', 'TextController@update');
    Route::get('/delete/{content}', 'TextController@destroy')->name('laracms.content.text.destroy');

});

//Route::group([
//    'middleware' => ['web', 'laracms.auth'],
//    'namespace'  => 'Grundmanis\Laracms\Modules\Content\Controllers',
//    'prefix'     => 'laracms/content/components'
//], function () {
//
//    Route::get('/', 'ComponentController@index')->name('laracms.content');
//    Route::get('/create', 'ComponentController@create')->name('laracms.content.create');
//    Route::post('/create', 'ComponentController@store');
//    Route::get('/edit/{content}', 'ComponentController@edit')->name('laracms.content.edit');
//    Route::post('/edit/{content}', 'ComponentController@update');
//    Route::get('/delete/{content}', 'ComponentController@destroy')->name('laracms.content.destroy');
//
//});