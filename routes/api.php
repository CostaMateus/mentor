<?php

use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\LeagueController;
use App\Http\Controllers\Api\DivisionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(["auth"])->group(function () {

    Route::name("api.league.")->prefix("leagues")->group(function () {

        Route::post("/{league}", [LeagueController::class, "update"])->name("update");
        Route::apiresource("/",   LeagueController::class)->parameters(["" => "league"]);

        Route::name("division.")->prefix("{league}/divisions")->group(function () {

            Route::post("/{division}", [DivisionController::class, "update"])->name("update");
            Route::apiresource("/",     DivisionController::class)->parameters(["" => "division"]);

            Route::name("team.")->prefix("{division}/teams")->group(function () {

                Route::post("/{team}",  [TeamController::class, "update"])->name("update");
                Route::apiresource("/",  TeamController::class)->parameters(["" => "team"]);

            });
        });

    });

// });
