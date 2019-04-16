<?php

Auth::routes();

// base route
Route::get('/', 'WebsiteController@index')->name('website');

Route::group(['prefix'=>'adm', 'as'=>'adm.', 'middleware'=>'auth'], function(){
    Route::get('/', 'AdmController@index')->name('index');
    Route::group(['prefix'=>'adm', 'as'=>'adm.', 'middleware'=>'auth'], function(){

    });
});
