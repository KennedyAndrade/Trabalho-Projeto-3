<?php

Auth::routes();

// base route
Route::get('/', 'WebsiteController@index')->name('website');

Route::group(['prefix'=>'adm', 'as'=>'adm.', 'middleware'=>'roles', 'roles'=>['adm']], function(){
    Route::get('/', 'AdmController@index')->name('index');

// Artigo
    Route::group(['prefix'=>'artigos', 'as'=>'artigos.'], function(){
        Route::get('/', 'ArtigoController@index')->name('index');
        Route::get('/criar', 'ArtigoController@create')->name('create');
        Route::post('/', 'ArtigoController@store')->name('store');
    });

});
