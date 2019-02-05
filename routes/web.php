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

/**
 * Authentication Routes
 */
Route::get('prihlasenie', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('prihlasenie', 'Auth\LoginController@login');
Route::post('odhlasenie', 'Auth\LoginController@logout')->name('logout');

/**
 * Password Reset Routes
 */
Route::get('heslo/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('heslo/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('heslo/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('heslo/reset', 'Auth\ResetPasswordController@reset');

/**
 * Pages
 */
Route::get('/', 'PagesController@index')->name('pages.index');

/**
 * Dashboard
 */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

/**
 * Article Pages
 */
Route::get('/dashboard/clanky', 'ArticlesController@index')->name('articles.index');
Route::get('/dashboard/clanky/vytvorit', 'ArticlesController@create')->name('articles.create');
Route::post('/dashboard/clanky/vytvorit', 'ArticlesController@store')->name('articles.store');
Route::get('/dashboard/clanky/{article}/upravit', 'ArticlesController@edit')->name('articles.edit');
Route::put('/dashboard/clanky/{article}/upravit', 'ArticlesController@update')->name('articles.update');
Route::delete('/dashboard/clanky/{article}/odstranit', 'ArticlesController@destroy')->name('articles.destroy');

/**
 * Carousel Pages
 */
Route::get('/dashboard/partneri', 'CarouselController@index')->name('carousel.index');
Route::get('/dashboard/partneri/vytvorit', 'CarouselController@create')->name('carousel.create');
Route::post('/dashboard/partneri/vytvorit', 'CarouselController@store')->name('carousel.store');
Route::get('/dashboard/partneri/{carouselImage}/upravit', 'CarouselController@edit')->name('carousel.edit');
Route::put('/dashboard/partneri/{carouselImage}/upravit', 'CarouselController@update')->name('carousel.update');
Route::delete('/dashboard/partneri/{carouselImage}/odstranit', 'CarouselController@destroy')->name('carousel.destroy');
