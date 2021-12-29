<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("contracts", function (Blueprint $table) {

            $table->bigInteger("team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams")
                  ->onDelete("cascade");

            $table->bigInteger("player_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("players")
                  ->onDelete("cascade");

            $table->date("start");
            $table->date("end");
            $table->integer("duration")->default(3); // em meses

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
        Schema::dropIfExists("contracts");
    }
}
