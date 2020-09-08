<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/messenger', 'HomeController@messenger');
Route::get('/get-message/{id}', 'HomeController@getMessage');
Route::post('/message', 'HomeController@message');

Route::group(['prefix' => 'admin'], function () {
  Route::get('login/{provider}', 'AdminAuth\LoginController@redirectToProvider');
  Route::get('login/{provider}/callback', 'AdminAuth\LoginController@handleProviderCallback');

  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::get('/home','Admin\AdminController@index');
    Route::get('/dashboard','Admin\AdminController@index');

    Route::resource('/course','Admin\CourseController');
    Route::resource('/subject','Admin\SubjectController');
    Route::resource('/post','Admin\PostController');

    Route::get('/meetings','Zoom\MeetingController@meetings');
    Route::get('/list','Zoom\MeetingController@list');
    Route::post('/meeting', 'Zoom\MeetingController@create');
    Route::get('/delete/meeting/{id}', 'Zoom\MeetingController@delete');
    Route::get('/edit/meeting/{id}', 'Zoom\MeetingController@get');

});
