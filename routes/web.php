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



Route::group(['middleware' => ['web']], function(){
	Route::get('/', function () {
   		return view('welcome');
	})->name('home');

	Route::post('/signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'signup',
	]);

	Route::post('/signin', [
		'uses' => 'UserController@postSignIn',
		'as' => 'signin',
	]);

	Route::get('/dashboard',[
		'uses' => 'UserController@getDashboard',
		'as' => 'dashboard',
		'middleware' => 'loggedin',
	]);

	Route::get('/logout',[
		'uses' => 'userController@logout',
		'as' => 'logout'
	]);

	Route::post('/createpost',[
		'uses' => 'PostController@postCreatePost',
		'as' => 'post.create'
	]);
});
