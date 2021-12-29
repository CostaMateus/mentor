<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("divisions", function (Blueprint $table) {
            $table->id();

            $table->bigInteger("league_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("leagues")
                  ->onDelete("cascade");

            $table->string("name")->unique();
            $table->string("initials");
            $table->integer("nrparticipants")->default(10);

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
        Schema::dropIfExists("divisions");
    }
}
