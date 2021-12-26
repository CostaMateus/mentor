<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTrophyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("team_trophy", function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->bigInteger("team_id")
                    ->unsigned()->index()
                    ->foreign()->references("id")
                    ->on("teams");

            $table->bigInteger("trophy_id")
                    ->unsigned()->index()
                    ->foreign()->references("id")
                    ->on("trophies");

            $table->date("won");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("team_trophy");
    }
}
