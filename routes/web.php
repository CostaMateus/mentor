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

/**
 * ROTAS DE CONSULTA
 */
// // Rota das taças
// Route::apiResource('trophy', 'TrophyController');

// // Rota dos usuarios
// Route::apiResource('user', 'UserController');

// // Rota dos players e rota dos seus atributos
// Route::apiResource('player', 'PlayerController');

// // Rota das ligas, das suas divisoes e seus respectivos times
// Route::prefix('league')->group(function () {

//     Route::get('{league}/teams', 'LeagueController@listTeams')->name('teams.list');

//     Route::apiResource('/', 'LeagueController')->parameters(['' => 'league']);

//     Route::prefix('{league}/division')->group(function () {
//         Route::apiResource('/', 'DivisionController')->parameters(['' => 'division']);
//     //     // Route::apiResource('{division}', 'DivisionController')->parameters(['division' => 'division']);
//     //     // Route::apiResource('{division}/team', 'TeamController')->parameters(['team' => 'team']);
//     });
// });
