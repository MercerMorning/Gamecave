<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'BackController@index')->name('admin.index');

    Route::get('/game/create', 'GameController@create')->name('admin.game.create');
    Route::get('/game/edit/{id}', 'GameController@edit')->name('admin.game.edit');
    Route::post('/game/add', 'GameController@add')->name('admin.game.add');
    Route::get('/game/save/{id}', 'GameController@save')->name('admin.game.save');
    Route::get('/game/delete/{id}', 'GameController@delete')->name('admin.game.delete');

    Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/add', 'CategoryController@add')->name('admin.category.add');
    Route::get('/category/save/{id}', 'CategoryController@save')->name('admin.category.save');
    Route::get('/category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
});
