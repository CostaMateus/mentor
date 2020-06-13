<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('league_id')
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("leagues");
            $table->bigInteger('division_id')
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("divisions")->nullable()->default(null);
            $table->string('name');
            $table->string('initials');
            $table->string('image')->default('default.png');
            
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
        Schema::dropIfExists('teams');
    }
}
