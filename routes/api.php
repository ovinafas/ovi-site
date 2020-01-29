<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return factory('App\User', 10)->make();
});


Route::get('/categories', 'CategoryController@index')->name("api.categories.index");
Route::post('/categories', 'CategoryController@store')->name("api.categories.store");
Route::get('/categories/{category}', 'CategoryController@edit')->name("api.categories.edit");
Route::put('/categories/{category}', 'CategoryController@update')->name("api.categories.update");
Route::delete('/categories/{category}', 'CategoryController@destroy')->name("api.categories.destroy");

Route::get('/users', 'UserController@index')->name("api.users.index");

Route::get('/tags', 'TagController@index')->name("api.tags.index");
Route::post('/tags', 'TagController@store')->name("api.tags.store");


Route::get("/posts/all", "PostController@index")->name("api.posts.index");
Route::post('/posts', 'PostController@store')->name("api.posts.store");

Route::post('/register', 'UserController@register')->middleware('guest');
Route::post('/login', 'UserController@login')->middleware('guest');
Route::post('/update/token', 'UserController@updateToken');
//
