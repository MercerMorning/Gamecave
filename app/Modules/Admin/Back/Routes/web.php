<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'BackController@index')->name('admin.index');
    Route::get('/game/create', 'GameController@create')->name('admin.game.create');
    Route::get('/game/edit/{id}', 'GameController@edit')->name('admin.game.edit');
    Route::post('/admin/game/add', 'GameController@add')->name('admin.game.add');
    Route::get('/admin/game/save/{id}', 'GameController@save')->name('admin.game.save');
    Route::get('/admin/game/delete/{id}', 'GameController@delete')->name('admin.game.delete');
});
