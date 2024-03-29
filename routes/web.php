<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('projects/welcome');
});

Route::resource('projects', 'ProjectsController');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

/*
Route::get('/projects', 'ProjectsController@index');

Route::post('/projects', 'ProjectsController@store');

Route::get('/projects/create', 'ProjectsController@create');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
