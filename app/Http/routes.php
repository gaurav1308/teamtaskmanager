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


Route::group(['middleware' => 'auth'], function () {

    Route:: get('/create_project','ProjectController@create'); //create new project

    Route::get('/project/people/{id}','ProjectController@add_user'); //add no user

    Route::post('/project/create', 'ProjectController@store1'); //adding data to list

    Route::get('/project/delete/{id}', 'ProjectController@delete'); //delete a project

    Route::get('/task/delete/{id}', 'TaskController@delete'); ///delete a task

    Route::post('/add/user', 'ProjectController@store2');

    Route::post('/task/create', 'TaskController@store2');

    Route:: get('/create_task','TaskController@create');

    Route:: post('create/tasks/{id}','TaskController@create1')->name('project.tasks.create');//create new task in a project

    Route::get('/{id}/project','ProjectController@index');

    Route::get('/projects','UserController@showProjects');  // shows projects of a user

    Route::resource('/tasks','TaskController');

    Route ::put('/update/project/{id}','ProjectController@update');// updating details of a project

    Route ::put('/update/task/{id}','ProjectController@update');//updating task details

    Route :: get('/act','TaskController@search'); //search action

    Route:: get('/edit/{id}','ProjectController@edit');//sending edit  request of a project

    Route:: get('task/edit/{id}','TaskController@edit'); //sending edit request of atask


});