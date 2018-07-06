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

# authentication routes
include('web/auth.php');

Route::get('/',          'IndexController@index')->name('index');
Route::get('/home',      'HomeController@index')->name('home');
Route::get('/rules',     'RulesController@index')->name('rules');
Route::get('/picks',     'PicksController@index')->name('picks');
Route::get('/standings', 'StandingsController@index')->name('standings');
Route::get('/feedback',  'FeedbackController@index')->name('feedback');
Route::get('/admin',     'AdminController@index')->name('admin');

