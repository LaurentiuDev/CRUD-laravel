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

Route::get('/add-button', 'HomeController@create');
Route::post('/add-task', 'HomeController@addTask');

Route::get('/edit-button/{id}', 'HomeController@edit');
Route::get('/edit-task/{id}', 'HomeController@editTask');
Route::delete('/delete-task/{id}', 'HomeController@deleteTask');
