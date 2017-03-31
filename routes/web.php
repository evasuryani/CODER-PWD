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


Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::resource('/home', 'HomeController');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm');
$this->post('login', 'Auth\LoginController@login');
$this->get('logout', 'Auth\LoginController@logout');
// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm');
$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
//$this->get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');
Route::resource('perlombaan', 'PerlombaanController');

//admin
// Route::resource('admin/bidang', 'Admin\\BidangController');
Route::resource('admin/user', 'Admin\\UserController');

//crud Routes
// Route::get('perlombaan', 'PerlombaanController@index');
