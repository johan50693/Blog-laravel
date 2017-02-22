<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['as' => 'admin.welcome', function () {
    return view('welcome');
}]);


Route::group(['prefix' =>'admin', 'middleware' => 'auth'],function(){

	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses' => 'UsersController@destroy',
		'as' => 'admin.users.destroy'
		]);

	Route::resource('categories', 'CategoriesController');
	Route::get('categories/{id}/destroy',[
		'uses' => 'CategoriesController@destroy',
		'as' => 'admin.categories.destroy'
		]);

/*	Route::get('auth',[
	'uses' => 'Auth\LoginController@login',
	'as' => 'admin.auth.login'
	]);

	Route::post('auth',[
	'uses' => 'Auth\LoginController@postlogin',
	'as' => 'admin.auth.postlogin'
	]);

	Route::get('desauth',[
	'uses' => 'Auth\LoginController@logout',
	'as' => 'admin.desauth.logout'
	]);
	*/
});

//EL FORMATO DEL 'as' TIENE LA RUTA DEL ARCHIVO QUE SE VA A EJECUTAR
//PARA LLAMAR A UNA VISTA SE USA EL NOMBRE DE LA RUTA

Route::get('admin/auth/login', [
		'uses'	=>	'Auth\LoginController@Login',
		'as'	=>	'admin.auth.login'		
	]);

Route::post('admin/auth/login', [
		'uses'	=>	'Auth\LoginController@postLogin',
		'as'	=>	'admin.auth.postlogin'
	]);

Route::get('admin/auth/logout', [
		'uses'	=>	'Auth\LoginController@logout',
		'as'	=>	'admin.auth.logout'
	]);