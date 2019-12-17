<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Games Routes
Route::get('games', 'GamesController@index');
Route::get('games/create', 'GamesController@create');
Route::get('games/{id}', 'GamesController@show');
Route::post('games', 'GamesController@store');

// Reviews Routes
// Route::post('games/{game}/reviews', 'ReviewsController@store');

Route::get('/reviews', 'ReviewsController@index');
 
Route::get('/reviews/{game}/create', 'ReviewsController@create');
 
Route::post('/games/{game}/reviews', 'ReviewsController@store');
 
Route::get('/reviews/{review}', 'ReviewsController@show');


// Registration and session routes

Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
 
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


