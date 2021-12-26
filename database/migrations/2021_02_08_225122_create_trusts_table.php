<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("trusts", function (Blueprint $table) {
            $table->id();

            $table->bigInteger("player_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("players");

            $table->integer("board")->default(100);
            $table->integer("fans")->default(80);

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
        Schema::dropIfExists("trusts");
    }
}
