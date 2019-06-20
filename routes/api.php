<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/instituicoes', [
    'uses' => 'InstitutionController@store'
]);

Route::get('/instituicoes', [
    'uses' => 'InstitutionController@get'
]);


Route::get('/courses', [
    'uses' => 'CourseController@get'
]);

Route::get('/courses/{id}', [
    'uses' => 'CourseController@show'
]);

Route::post('/courses/subscript', [
    'uses' => 'CourseController@subscript'
]);

Route::post('/disciplines', [
    'uses' => 'DisciplineController@store'
]);

Route::post('/disciplines/subscript', [
    'uses' => 'DisciplineController@subscript'
]);

Route::get('/disciplines', [
    'uses' => 'DisciplineController@show'
]);


Route::post('/classes', [
    'uses' => 'ClassController@store'
]);

Route::group(['middleware' => 'auth:web'], function(){
    Route::get('/user_data', [
        'uses' => 'UserController@show'
    ]);
});

Route::post('/homeworks', [
    'uses' => 'HomeworkController@store'
]);

Route::get('/homeworks', [
    'uses' => 'HomeworkController@show'
]);
