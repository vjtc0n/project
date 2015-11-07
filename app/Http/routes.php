<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/login','UserController@getLogin');
Route::post('/login','UserController@postLogin');


// Allow users with the permission "access" to see the page.
Route::get('/test', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => 'access',
    'uses' => 'MyController@myAction'
]);

// Allow users with "access" OR "admin" to see the page.
Route::get('/test', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['access', 'admin'],
    'uses' => 'MyController@myAction'
]);

// Allow users with "access" AND "admin" to see the page.
Route::get('/test', [
    'middleware' => ['auth', 'permissions.required'],
    'permissions' => ['access', 'admin'],
    'permissions_require_all' => true,
    'uses' => 'MyController@myAction'
]);

