<?php

# AUTHENTICATION ROUTES
Route::namespace('Auth')->group(function () {

     # GUEST USERS
    Route::middleware(['guest'])->group(function () {

        # REGISTRATION
        Route::prefix('register')->group(function () {
            Route::get('/',  'RegisterController@showRegistrationForm')->name('register');
            Route::post('/', 'RegisterController@createUser')->name('create_user');
        });

        # LOGIN
        Route::prefix('login')->group(function () {
            Route::get('/',  'LoginController@showLoginForm')->name('login');
            Route::post('/', 'LoginController@authenticate')->name('authenticate');
        });

        # PASSWORD
        Route::prefix('password')->group(function () {
            Route::get('forgot',             'ForgotPasswordController@showForgotPasswordForm')->name('forgot_password_form');
            Route::post('forgot',            'ForgotPasswordController@sendLink')->name('send_reset_password_link');
            Route::get('reset/{id}/{token}', 'ResetPasswordController@showResetForm')->name('reset_password_form');
            Route::post('reset',             'ResetPasswordController@resetPassword')->name('reset_password');
        });

    });

    # AUTHENTICATED USERS
    Route::middleware(['auth'])->group(function () {

        # LOGOUT
        Route::prefix('logout')->group(function () {
            Route::get('/', 'LogoutController@logout')->name('logout');
        });

    });

});