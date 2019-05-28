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

