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

Route::auth();

Route::get('/home', 'HomeController@index');

//Route:: get('/create_task','TaskController@create');
//
//
//Route::resource('/{id}/project','ProjectController');
//
//Route:: get('/create_project','ProjectController@create');
//
//Route::resource('/{id}','UserController');


Route::group(['middleware' => 'auth'], function () {
    Route:: get('/create_project','ProjectController@create');

    Route::post('/project/create', 'ProjectController@store1');

    Route::post('/task/create', 'TaskController@store2');
    // All my routes that needs a logged in user
    Route:: get('/create_task','TaskController@create');

//    Route::post('/project/create', 'ProjectController@store');


    Route::get('/{id}/project','ProjectController@index');

//    Route:: get('/create_project','ProjectController@create');

    Route::get('/projects','UserController@showProjects');

});