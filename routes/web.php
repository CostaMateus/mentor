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

Auth::routes(['register' => false]);

Route::get('/redirect', 'LoginController@redirect')->name('google.redirect');
Route::get('/callback', 'LoginController@callback')->name('google.callback');


Route::middleware(['auth'])->group(function () {
    
    Route::get('/', 'HomeController@index')->name('welcome');

    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/admin', function () {
        return view('adm.home');
    })->name('admin.home');

    Route::resource('/leagues',  'LeagueController');
    Route::resource('/teams',    'TeamController');
    Route::resource('/players',  'PlayerController');
    Route::resource('/trophies', 'TrophyController');

});