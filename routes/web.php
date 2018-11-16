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

# AUTHENTICATION
include('web/auth.php');

# INDEX
Route::get('/', 'IndexController@index')->name('index');

# HOME
Route::get('/home',  'HomeController@index')->name('home');
Route::get('/rules', 'RulesController@index')->name('rules');

# PICKS
Route::prefix('picks')->group(function () {
    Route::get('/',  'PicksController@makePicks')->name('make_picks');
    Route::post('/', 'PicksController@savePicks')->name('save_picks');
});

# STANDINGS
Route::get('/standings', 'StandingsController@index')->name('standings');

# FEEDBACK
Route::get('/feedback', 'FeedbackController@index')->name('feedback');

# ADMIN
Route::get('/admin', 'AdminController@index')->name('admin');

