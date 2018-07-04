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

Route::get('/', 'HomeController@index')->name('home');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@createUser')->name('create_user');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@authenticate')->name('authenticate');

Route::get('logout', 'Auth\LogoutController@logout')->name('logout');

Route::get('password/forgot', 'Auth\ForgotPasswordController@showForgotPasswordForm')->name('forgot_password_form');
Route::post('password/forgot', 'Auth\ForgotPasswordController@sendLink')->name('send_reset_password_link');
Route::get('password/reset/{id}/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset_password_form');
Route::post('password/reset', 'Auth\ResetPasswordController@resetPassword')->name('reset_password');