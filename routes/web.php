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

Route::get('/', [
    'uses' => 'PageController@index',
    'as' => 'index'
]);

Auth::routes();

Route::get('courselist/{department}', [
    'uses' => 'PageController@courseList',
    'as' => 'course.list'
]);

Route::get('filelist', [
    'uses' => 'PageController@fileList',
    'as' => 'file.list',
    'middleware' => 'auth'
]); 

//Routes for file
Route::get('course/{id}', [
    'uses' => 'FileController@index',
    'as' => 'file.index'
]);

Route::get('file/{id}', [
    'uses' => 'FileController@show',
    'as' => 'file.show'
]);

Route::get('file/{id}/create', [
    'uses' => 'FileController@create',
    'as' => 'file.create',
    'middleware' => 'auth'
]);

Route::post('file/{id}/store', [
    'uses' => 'FileController@store',
    'as' => 'file.store',
    'middleware' => 'auth'
]);

Route::get('file/{id}/edit', [
    'uses' => 'FileController@edit',
    'as' => 'file.edit',
    'middleware' => 'auth'
]);

Route::post('file/{id}/update', [
    'uses' => 'FileController@update',
    'as' => 'file.update',
    'middleware' => 'auth'
]);

Route::delete('file/{id}', [
    'uses' => 'FileController@destroy',
    'as' => 'file.delete',
    'middleware' => 'auth'
]);

Route::get('file/{id}/download', [
    'uses' => 'FileController@download',
    'as' => 'file.download'
]);

//Routes for comment
Route::post('comment/{id}/store', [
    'uses' => 'CommentController@store',
    'as' => 'comment.store',
    'middleware' => 'auth'
]);