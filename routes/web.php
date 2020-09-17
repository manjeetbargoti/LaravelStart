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

use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::prefix('admin')->namespace('Admin')->group(function(){
    // All the admin routes will be defined here
    Route::match(['get','post'], '/login', 'AdminController@login')->name('adminLogin');

    Route::group(['middleware' => ['admin']], function()
    {   
        // Admin Dashboard Route
        Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');

        // Admin account routes (View Profile, Edit Profile, Change Password)
        Route::get('profile', 'AdminController@profile')->name('adminProfile');
        Route::match(['get','post'], 'profile/admin/edit', 'AdminController@editAdminProfile')->name('editAdminProfile');
        Route::match(['get','post'] ,'profile/password/update', 'AdminController@changePassword')->name('adminUpdatePassword');
        Route::match(['get','post'], 'check-admin-pass', 'AdminController@checkAdminPassword')->name('checkAdminPassword');

        // Admin Setting Routes (General Setting, Header Setting, Footer Setting)
        Route::match(['get','post'], 'settings/general', 'SettingController@generalSettings')->name('generalSettings');
        Route::match(['get','post'], 'settings/header', 'SettingController@headerSettings')->name('headerSettings');
        Route::match(['get','post'], 'settings/footer', 'SettingController@footerSettings')->name('footerSettings');

        // Admin Logout Route
        Route::match(['get','post'], 'logout', 'AdminController@logout')->name('adminLogout');
        
    });
});
