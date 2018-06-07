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

Route::get('/', 'LoginController@home')->name('home');
Route::get('login', 'LoginController@login');

Route::get('terms', 'TermsController@terms')->name('terms');

Route::get('auth/google/redirect', 'AuthGoogleController@redirect')->name('google');
Route::get('auth/google/callback', 'AuthGoogleController@callback');

Route::get('nominate', 'NominationController@create')->name('nominate');
Route::get('nominations', 'NominationController@index')->name('nominations');
Route::get('nominations/{slug}', 'NominationController@show');

Route::post('nominations', 'NominationController@store');
Route::get('nominations/{slug}/edit', 'NominationController@edit');
Route::post('nominations/{slug}', 'NominationController@update');

Route::post('nominations/delete/{slug}', 'NominationController@destroy')->name('delete');
