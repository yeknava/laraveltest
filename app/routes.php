<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('as'=>'home', 'uses'=>'QuestionsController@index'));
Route::get('users', array('as'=>'register', 'uses'=>'UsersController@index'));
Route::post('users', array('before'=>'csrf', 'uses'=>'UsersController@post'));
Route::get('users/login', array('as'=>'login', 'uses'=>'UsersController@login'));
Route::post('users/login', array('before'=>'csrf', 'uses'=>'UsersController@postLogin'));
Route::get('users/logout', array('as'=>'logout', 'uses'=>'UsersController@getLogout'));
Route::post('/', array('before'=>'csrf', 'uses'=>'QuestionsController@post'));
Route::get('question/{id}', array('as'=>'question', 'uses'=>'QuestionsController@show'));
Route::get('question/{id}/edit', array('as'=>'editQuestion', 'uses'=>'QuestionsController@getEdit'));
Route::post('answer', array('before'=>'csrf', 'uses'=>'AnswersController@postCreate'));
Route::put('question/update', array('before'=>'csrf', 'uses'=>'QuestionsController@putUpdate'));
Route::get('yoursquestion', array('as'=>'yourQuestion', 'uses'=>'QuestionsController@getYourquestion'));

Route::post('search', array('before'=>'csrf', 'uses'=>'QuestionsController@postSearch'));
Route::get('results/{keyword}', array('uses'=>'QuestionsController@getResults'));
// Route::get('/', function()
// {
// 	return View::make('hello');
// });
