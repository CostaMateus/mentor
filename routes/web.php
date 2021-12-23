<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TrophyController;
use App\Http\Controllers\DivisionController;

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

Route::get('/redirect', [LoginController::class, 'redirect'])->name('google.redirect');
Route::get('/callback', [LoginController::class, 'callback'])->name('google.callback');

Route::get('/logout',   [LoginController::class, 'logout'])->name('logout');

// Route::get('/load', 'TestController@load'); // rota de teste

Route::middleware(['auth'])->group(function () {

    Route::get('/',                  [HomeController::class, 'index'])->name('welcome');

    Route::get('/home',              [HomeController::class, 'index'])->name('home');

    Route::get('/novo',              [HomeController::class, 'newGame'])->name('new-game');
    Route::get('/conf',              [HomeController::class, 'setConfigs'])->name('set-configs');

    Route::get('/admin', function () {
        return view('adm.home');
    })->name('admin.home');

    Route::get('/mentors',           [PlayerController::class, 'listMentors'])->name('player.mentor');

    Route::apiresource('/players',   PlayerController::class);
    Route::post('/players/{player}', [PlayerController::class, 'update'])->name('player.update');

    Route::apiresource('/trophies',  TrophyController::class);

    Route::apiresource('/teams',     TeamController::class);
    Route::post('/teams/{team}',     [TeamController::class, 'update'])->name('team.update');

    Route::prefix('leagues')->group(function () {

        Route::get('/specials',        [LeagueController::class, 'specials']);

        Route::apiresource('/',        LeagueController::class)->parameters(['' => 'league']);
        Route::post('{league}/update', [LeagueController::class, 'update']);

        Route::prefix('{league}/divisions')->group(function () {

            Route::apiresource('/',                DivisionController::class)->parameters(['' => 'division']);
            Route::apiresource('{division}/teams', TeamController::class)->parameters(['' => 'team']);

        });
    });

    // Route::get('/teste', 'TestController@index'); // rota de teste
});
