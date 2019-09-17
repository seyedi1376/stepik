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



Route::get('lessons', 'LessonController@index');
Route::get('lessons/{id}', 'LessonController@show');
Route::post('lessons', 'LessonController@store');
Route::delete('lessons/{id}', 'LessonController@destroy');
Route::put('lessons/{id}', 'LessonController@update');


Route::get('groups', 'GroupController@index');
Route::get('groups/{id}', 'GroupController@show');
Route::post('groups', 'GroupController@store');
Route::delete('groups/{id}', 'GroupController@destroy');
Route::put('groups/{id}', 'GroupController@update');



Route::get('tags', 'TagController@index');
Route::get('tags/{id}', 'TagController@show');
Route::post('tags', 'TagController@store');
Route::delete('tags/{id}', 'TagController@destroy');
Route::put('tags/{id}', 'TagController@update');
//Route::get('groups/{id}/edit','GroupController@edit');

Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show');
Route::post('categories', 'CategoryController@store');
Route::delete('categories/{id}', 'CategoryController@destroy');
Route::put('categories/{id}', 'CategoryController@update');