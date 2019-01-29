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

Route::match(['get','post'],'/', 'IndexController@execute')->name('index');

Route::match(['get','post'],'/settings', 'SettingsController@execute')->name('settings');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>['auth', 'checkAdmin']],function() {
	//Route::get('/','Admin\IndexController@index')->name('adminIndex');
	Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);
    
    Route::group(['prefix'=>'doors'],function() {
		
		Route::get('/',['uses'=>'Admin\DoorsController@execute','as'=>'door']);
		
		Route::match(['get','post'],'/add',['uses'=>'Admin\DoorsController@add','as'=>'doorsAdd']);
	
		Route::match(['get','post','delete'],'/edit/{door}',['uses'=>'Admin\DoorsController@edit','as'=>'doorsEdit']);
		
	});
	
	
	Route::group(['prefix'=>'permissions'],function() {
		
		Route::get('/',['uses'=>'Admin\PermissionsController@execute','as'=>'permission']);
		
		Route::match(['get','post'],'/add',['uses'=>'Admin\PermissionsController@add','as'=>'permissionsAdd']);
		
		Route::match(['get','post','delete'],'/edit/{permission}',['uses'=>'Admin\PermissionsController@edit','as'=>'permissionsEdit']);
		
	});
	
	
	Route::group(['prefix'=>'users'],function() {
		
		Route::get('/',['uses'=>'Admin\UsersController@execute','as'=>'user']);
		
		Route::match(['get','post'],'/add',['uses'=>'Admin\UsersController@add','as'=>'usersAdd']);
		
		Route::match(['get','post','delete'],'/edit/{user}',['uses'=>'Admin\UsersController@edit','as'=>'usersEdit']);
		
	});
	
});

