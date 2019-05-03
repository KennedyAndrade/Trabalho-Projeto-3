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
        Route::get('/{artigo}/editar', 'ArtigoController@edit')->name('edit');
        Route::put('/{artigo}/editar', 'ArtigoController@update')->name('update');
        Route::delete('/{artigo}', 'ArtigoController@destroy')->name('destroy');
    });

// Produto
    Route::group(['prefix'=>'produtos', 'as'=> 'produtos.'], function(){
        Route::get('/', 'ProdutoController@index')->name('index');
        Route::get('/criar', 'ProdutoController@create')->name('create');
        Route::post('/', 'ProdutoController@store')->name('store');
        Route::get('/{produto}/editar', 'ProdutoController@edit')->name('edit');
        Route::put('/{produto}/editar', 'ProdutoController@update')->name('update');
        Route::delete('/{produto}', 'ProdutoController@destroy')->name('destroy');

    });

// Clientes
    Route::group(['prefix'=>'clientes', 'as'=> 'clientes.'], function(){
        Route::get('/', 'ClienteController@index')->name('index');

    });
});
