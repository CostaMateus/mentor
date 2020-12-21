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
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('lastname');
            $table->string('nickname');
            $table->string('nationality')->default('Brasileiro');
            $table->integer('age');
            $table->date('birthday');
            $table->string('sex')->default('M');
            $table->boolean('employed')->default(false);
            $table->boolean('mentor')->default(false);

            $table->bigInteger('user_id')
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("users")->default(0);

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
        Schema::dropIfExists('players');
    }
}
