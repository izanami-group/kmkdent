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

// Authentication Routes...
Route::get('prihlasenie', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('prihlasenie', 'Auth\LoginController@login');
Route::post('odhlasenie', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('heslo/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('heslo/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('heslo/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('heslo/reset', 'Auth\ResetPasswordController@reset');

// Pages
Route::get('/', 'PagesController@index')->name('pages.index');

// Dashboard Pages
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/dashboard/clanky', 'ArticlesController@index')->name('articles.index');
Route::get('/dashboard/clanky/vytvorit', 'ArticlesController@create')->name('articles.create');
Route::post('/dashboard/clanky/vytvorit', 'ArticlesController@store')->name('articles.store');
Route::get('/dashboard/clanky/{article}/upravit', 'ArticlesController@edit')->name('articles.edit');
Route::put('/dashboard/clanky/{article}/upravit', 'ArticlesController@update')->name('articles.update');
Route::delete('/dashboard/clanky/{article}/odstranit', 'ArticlesController@destroy')->name('articles.destroy');
