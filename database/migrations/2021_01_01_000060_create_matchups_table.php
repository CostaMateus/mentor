<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("matchups", function (Blueprint $table) {
            $table->id();

            $table->integer("split");
            $table->integer("round");
            $table->date("date");

            $table->bigInteger("division_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("divisions")
                  ->nullable();

            $table->bigInteger("blue_team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams");
            $table->bigInteger("red_team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams");

            $table->bigInteger("winner_team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("matchups");
    }
}
