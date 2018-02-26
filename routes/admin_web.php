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

Route::namespace('auth')->middleware('guest:user')->group(function () {
    // Login
    Route::get('/', 'LoginController@showLoginForm')->name('admin_login_page');
    Route::post('/', 'LoginController@login');

    // Forget and reset Password
    Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('admin_forgot_password_page');
    Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('admin_forgot_password');
    Route::get('password/reset/{token}/{email}', 'ResetPasswordController@showResetForm')->name('admin_password_reset_page');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('admin_password_reset');
});

// Logged in admin user required
Route::group(['middleware' => 'auth:user'], function () {
      // dashboard
      Route::get('/dashboard', 'UserController@home')->name('admin_home');

      // User
      Route::resource('users', 'UserController');

    // Logout
    Route::get('/logout', 'UserController@logout')->name('admin_logout');
});
