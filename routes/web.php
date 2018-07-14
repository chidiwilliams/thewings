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
Route::get('/done', 'DoneController@done')->name('done');
Route::get('/wings', 'DoneController@ceremony')->name('ceremony');
Route::get('/iv', 'DoneController@iv')->name('iv');
Route::post('/iv', 'DoneController@getIV')->name('getIV');
Route::get('/attend', 'DoneController@attend')->name('attend');
// Route::get('login', 'LoginController@login')->name('login');
// Route::get('auth/logout', 'LoginController@logout')->name('logout');

Route::get('terms', 'TermsController@terms')->name('terms');

// Route::get('auth/google/redirect', 'AuthGoogleController@redirect')->name('google');
// Route::get('auth/google/callback', 'AuthGoogleController@callback');

// Route::get('nominate', 'NominationController@create')->name('nominate');
// Route::get('nominations', 'NominationController@index')->name('nominations');
// Route::get('nominations/{slug}', 'NominationController@show');

// Route::post('nominations', 'NominationController@store');
// Route::get('nominations/{slug}/edit', 'NominationController@edit');
// Route::post('nominations/{slug}', 'NominationController@update');

// Route::post('nominations/delete/{slug}', 'NominationController@destroy')->name('delete');

Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('admin/users', 'ExportController@users');
    Route::get('admin/nominations', 'ExportController@nominations');
    Route::get('admin/ivs', 'DoneController@ivs');
});
