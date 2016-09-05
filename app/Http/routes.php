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



Route::post('user/register','UserController@postUser');
Route::get('user/login/{email}/{password}','UserController@getUser');

Route::controller('course', 'CourseController');

    Route::group(['middleware' => ['jwt-auth','roles']], function () {

        Route::controller('user', 'UserController');
     
});



