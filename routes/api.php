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

Route::post('/addUser','UserController@createUser');
Route::post('/getUser','UserController@getUserDetails')->middleware('auth:api');

Route::post('/createShout','ShoutOutController@createOne')->middleware('auth:api');
Route::post('/getShout','ShoutOutController@getOne')->middleware('auth:api');
Route::get('/getallShout','ShoutOutController@getall')->middleware('auth:api');

Route::post('/likeOne','ShoutOutController@likeOne');
Route::post('/commentOne','ShoutOutController@commentOne')->middleware('auth:api');

Route::post('/editShout','ShoutOutController@editOne')->middleware('auth:api');
Route::post('/deleteShout','ShoutOutController@deleteOne')->middleware('auth:api');
Route::post('/editComment','ShoutOutController@editComment')->middleware('auth:api');
Route::post('/deleteComment','ShoutOutController@deletComment')->middleware('auth:api');

Route::post('/unlike','ShoutOutController@unlike')->middleware('auth:api');