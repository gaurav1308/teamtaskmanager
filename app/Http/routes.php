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

    Route::get('/project/people/{id}','ProjectController@add_user');

    Route::post('/project/create', 'ProjectController@store1');

    Route::get('/project/delete/{id}', 'ProjectController@delete');

    Route::get('/task/delete/{id}', 'TaskController@delete');

    Route::post('/add/user', 'ProjectController@store2');

    Route::post('/task/create', 'TaskController@store2');

    Route:: get('/create_task','TaskController@create');

    Route:: post('create/tasks/{id}','TaskController@create1')->name('project.tasks.create');

    Route::get('/{id}/project','ProjectController@index');


    Route::get('/projects','UserController@showProjects');

    Route::resource('/tasks','TaskController');

    Route :: get('/act','TaskController@search');
});