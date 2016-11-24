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

/**
 * @SWG\Swagger(schemes={"http"}, basePath="/", @SWG\Info(version="1.0.0", title="Api tdah"))
 */

Route::post('user/register','UserController@postUser');
Route::get('user/login/{email}/{password}','UserController@getUser');


Route::group(['middleware' => ['jwt-auth']], function () {
    Route::controller('user', 'UserController');
    Route::controller('course', 'CourseController');
    Route::controller('class', 'ClassController');
    Route::controller('question', 'ClassQuestionController');
     
});



