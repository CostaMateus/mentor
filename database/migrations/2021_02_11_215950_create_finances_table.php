<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("finances", function (Blueprint $table) {
            $table->id();

            $table->bigInteger("team_id")
                  ->unsigned()->index()
                  ->foreign()->references("id")
                  ->on("teams");

            $table->enum("category", array(
                "in_awards",
                "in_fines",
                "in_loan",
                "in_selling_players",
                "in_several",
                "in_sponsorships",
                "in_supporter_partner",
                "out_buying_players",
                "out_fines",
                "out_loan",
                "out_salary",
                "out_several",
                "balance"
            ));
            $table->double("value", 11, 2);
            $table->boolean("type");
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
        Schema::dropIfExists("finances");
    }
}
