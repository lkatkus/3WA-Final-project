<?php

Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::get('/about', function(){ return view('about'); })->name('about');

// CUSTOM ROUTES
    Route::get('/level/user', 'LevelController@userLevels')->name('userLevels'); // ROUTE FOR SHOWING CURRENT USER CREATED LEVELS
    Route::put('/level/{id}/feature', 'LevelController@featureLevel')->name('featureLevel'); // ROUTE FOR SETTING FEATURES LEVELS SHOWN IN HOMEPAGE
    Route::put('/user/{id}', 'UserController@userConfirm')->name('userConfirm'); // ROUTE FOR USER CONFIRMATION BY ADMIN

// RESOURCE ROUTES
    Route::resource('/level', 'LevelController');
    Route::resource('/user', 'UserController');
