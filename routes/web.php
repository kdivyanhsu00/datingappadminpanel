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

Route::get('/', 'Admin\DashboardController@index')->name('home');
Route::get('/home', 'Admin\DashboardController@index')->name('home');

Auth::routes();

$settings = array(
  'prefix'    => 'admin',
  'before'    => 'auth|admin',
  'namespace' => 'Admin',
);

Route::group($settings, function($route) 
{
  # User Route
  Route::resource('dashboard', 'DashboardController');
  Route::resource('user', 'UserController');
  Route::any('user/block/{id}/{status}', 'UserController@block');

  Route::resource('sendnotification','SendNotificationController');
  Route::resource('emailnotification','EmailNotificationController');

  Route::get('change-password','AdminController@showChangePasswordForm');
  Route::post('changePassword','AdminController@changePassword')->name('changePassword');
});

