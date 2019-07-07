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

Route::get('/', function () {
    return view('welcome');
});

# posts router
Route::middleware(['is_login'])->group(function () {
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts/store', 'PostController@store')->name('posts.store');
    Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
    Route::patch('/posts/{id}', 'PostController@update')->name('posts.patch');
    Route::get('/posts/{id}', 'PostController@show')->name('posts.show');

    #auth router
    Route::get('/user/logout', 'UserController@logout')->name('user.logout');
});

# auth router
Route::post('/user/login', 'UserController@login')->name('user.login');
