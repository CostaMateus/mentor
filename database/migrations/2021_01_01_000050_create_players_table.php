<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("players", function (Blueprint $table) {
            $table->id();

            $table->bigInteger("team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams")
                  ->nullable()->default(null);

            $table->string("name");
            $table->string("lastname");
            $table->string("nickname")->unique();

            $table->bigInteger("country_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("countries")
                  ->default(30); // BRASIL

            $table->date("birthday");
            $table->string("sex")->default("M");
            $table->boolean("mentor")->default(false);

            $table->bigInteger("user_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("users")
                  ->nullable()->default(null);

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
        Schema::dropIfExists("players");
    }
}
