<?php
Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Content\Controllers',
    'prefix'     => 'laracms/content/dynamic'
], function () {
    Route::get('/', 'ContentDynamicController@index')->name('laracms.content.dynamic');
    Route::get('/create', 'ContentDynamicController@create')->name('laracms.content.dynamic.create');
    Route::post('/create', 'ContentDynamicController@store');
    Route::get('/edit/{content}', 'ContentDynamicController@edit')->name('laracms.content.dynamic.edit');
    Route::post('/edit/{content}', 'ContentDynamicController@update');
    Route::get('/delete/{content}', 'ContentDynamicController@destroy')->name('laracms.content.dynamic.destroy');
});