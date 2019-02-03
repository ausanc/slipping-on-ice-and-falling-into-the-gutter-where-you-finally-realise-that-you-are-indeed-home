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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks', 'HouseController@displayTaskList')->name('my_house')->middleware('auth');

Route::get('/tasks/{task_id}', 'HouseController@getTask');

Route::post('/tasks/new', 'HouseController@newTask')->name('new_task')->middleware('auth');

Route::get('/complete/{task_id}', 'TaskController@completeTask');
