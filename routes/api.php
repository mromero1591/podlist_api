<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::get('/user', 'UserController@user');
Route::get('/users', 'UserController@list');
Route::get('/users/{id}', 'UserController@find');
Route::post('/users', 'UserController@create');
Route::put('/users/{id}', 'UserController@update');
Route::delete('/users/{id}', 'UserController@delete');

Route::apiResource('/podcast', 'PodcastController');
Route::get('/podcast/favorite/{id}', 'FavoritePodcastController@getFavoritePodcast');
Route::post('/podcast/favorite', 'FavoritePodcastController@create');
Route::post('/podcast/favorite/remove', 'FavoritePodcastController@remove');

//Route::group(['middleware' => 'auth:api'], function() {
//});


