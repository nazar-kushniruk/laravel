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
use App\Task;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
Route::auth();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get(['/', '/tasks', '/task' ], 'TaskController@index');
Route::get('/tasks', 'TaskController@index');
Route::get('/task', 'TaskController@index');
Route::get('/', 'TaskController@index');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::get('/task/{id}',  'TaskController@show');
Route::get('/task/create',  'TaskController@create');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::post('/comment', 'CommentController@store')->name('comment.store');
