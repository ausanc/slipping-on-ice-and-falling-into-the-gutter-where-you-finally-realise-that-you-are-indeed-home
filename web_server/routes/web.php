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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/house/{user_id}', 'HouseController@getHouseTasks');

Route::get('/tasks', 'HouseController@displayTaskList')->middleware('auth');

Route::get('/complete/{task_id}', 'TaskController@completeTask');
