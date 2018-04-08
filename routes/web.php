<?php

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'TimelineController@index');
	Route::get('/posts', 'PostController@index');
	Route::post('/posts', 'PostController@create');

	Route::get('/users/{user}', 'UserController@index')->name('users');
	Route::get('/users/{user}/follow', 'UserController@follow')->name('users.follow');
	Route::get('/users/{user}/unfollow', 'UserController@unfollow')->name('users.unfollow');
});