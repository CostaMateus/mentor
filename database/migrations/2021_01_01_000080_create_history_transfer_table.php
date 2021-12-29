<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("history_transfers", function (Blueprint $table) {
            $table->id();

            $table->bigInteger("player_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("players")
                  ->onDelete("cascade");

            $table->bigInteger("seller_team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams");

            $table->bigInteger("buyer_team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams");

            $table->double("value", 11, 2);
            $table->date("date");

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
        Schema::dropIfExists("history_transfers");
    }
}
