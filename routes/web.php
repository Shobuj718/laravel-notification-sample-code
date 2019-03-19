<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 01739826126
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/notifymail', 'HomeController@notifymail')->name('notifymail');
Route::get('/varifyEmail/{id}', 'HomeController@varifyEmail')->name('varifyEmail');

Route::get('/home', 'HomeController@index')->name('home');
