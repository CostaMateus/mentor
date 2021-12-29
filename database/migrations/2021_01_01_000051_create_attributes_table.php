<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("attributes", function (Blueprint $table) {
            $table->id();

            $table->bigInteger("player_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("players")
                  ->onDelete("cascade");

            $table->enum("role",           array("top", "jng", "mid", "adc", "sup"));
            $table->enum("secondary_role", array("top", "jng", "mid", "adc", "sup"));
            $table->integer("force");
            $table->integer("energy")->default(100);
            $table->double("salary", 11, 2);
            $table->double("pass", 11, 2);

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
        Schema::dropIfExists("attributes");
    }
}
