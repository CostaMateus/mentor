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

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);

Route::get('/redirect', 'LoginController@redirect')->name('google.redirect');
Route::get('/callback', 'LoginController@callback')->name('google.callback');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('welcome');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin', function () {
        return view('adm.home');
    })->name('admin.home');

    Route::apiresource('/players', 'PlayerController');
    Route::post('/players/{player}', 'PlayerController@update')->name('player.update');

    Route::apiresource('/trophies', 'TrophyController');

    Route::apiresource('/teams', 'TeamController');
    Route::post('/teams/{team}', 'TeamController@update')->name('team.update');

    Route::prefix('leagues')->group(function () {

        Route::get('/specials', 'LeagueController@specials');

        Route::apiresource('/', 'LeagueController')->parameters(['' => 'league']);
        Route::post('{league}/update', 'LeagueController@update');

        Route::prefix('{league}/divisions')->group(function () {

            Route::apiresource('/', 'DivisionController')->parameters(['' => 'division']);
            Route::apiresource('{division}/teams', 'TeamController')->parameters(['' => 'team']);
        });
    });
});
