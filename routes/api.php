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

Route::group([
    'prefix' => 'students'
], function ($router) {
    Route::get('/', 'StudentsController@index');
    Route::get('/{id}', 'StudentsController@show');
    Route::post('/', 'StudentsController@store');
});

Route::group([
    'prefix' => 'auth',
], function($router) {
    Route::post('login', 'AuthController@login');
	Route::post('register', 'AuthController@register');
});

Route::group([
    'prefix' => 'courses'
], function ($router) {
    Route::get('/', 'CoursesController@index');
    Route::get('/{uuid}', 'CoursesController@show');
    Route::post('/', 'CoursesController@store');
});

