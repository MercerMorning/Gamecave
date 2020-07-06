<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontController@main')->name('main');
Route::get('/search', 'FrontController@search')->name('search');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'LogoutController@index')->name('logout');
Route::get('/games', 'FrontController@gamesList')->name('games.list');
Route::get('/game/{id}', 'FrontController@single')->name('game.single');
Route::get('/game/link/{site}/{game}/{status}', 'FrontController@link')->name('game.link');
Route::get('/game/category/{id}', 'FrontController@categoryList')->name('category.list');

//мидлвэр авторизации
Route::post('/game/comment/add/{id}', 'CommentController@add')->name('game.comment.add');

Route::get('/login', 'LoginController@create')->name('login');

Auth::routes(['verify' => true]);


