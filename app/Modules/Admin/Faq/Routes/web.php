<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'faq'], function () {
    Route::get('/', 'FaqController@index')->name('faqs.index');
});
