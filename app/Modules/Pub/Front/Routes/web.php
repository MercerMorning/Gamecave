<?php

use Illuminate\Support\Facades\Route;

//Route::get('/game/{id}', 'FrontController@single')->name('game.single');
//Route::get('/game/link/{site}/{game}', 'FrontController@link')->name('game.link');
//Route::post('/game/comment/add/{id}', 'CommentController@add')->name('game.comment.add');

Route::get('/', 'FrontController@home')->name('home');
Route::get('/games', 'FrontController@list')->name('games.list');
Route::get('/game/{id}', 'FrontController@single')->name('game.single');

Route::get('/login', 'LoginController@create')->name('login');

Auth::routes();

