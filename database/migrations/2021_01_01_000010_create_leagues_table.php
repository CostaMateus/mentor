<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("leagues", function (Blueprint $table) {
            $table->id();

            $table->string("name")->unique();
            $table->string("initials")->unique();
            $table->integer("nrdivisions")->default(1);
            $table->integer("nrparticipants")->default(8);
            $table->boolean("special")->default(0);
            $table->string("image")->default("default.png");

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
        Schema::dropIfExists("leagues");
    }
}
