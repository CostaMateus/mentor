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
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('player_id')
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("players");
            $table->enum('role', array('Top', 'Jng', 'Mid', 'Adc', 'Sup'));
            $table->integer('force');
            $table->integer('energy')->default(100);
            $table->double('salary', 9, 2);
            $table->double('pass', 9, 2);

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
        Schema::dropIfExists('attributes');
    }
}
