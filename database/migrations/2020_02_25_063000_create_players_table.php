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
            $table->char('first_name', 100);
            $table->char('second_name', 100);
            $table->decimal('form', 2, 1);
            $table->integer('total_points');
            $table->decimal('influence', 5, 1);
            $table->decimal('creativity', 3, 1);
            $table->decimal('threat', 4, 1);
            $table->decimal('ict_index', 3, 1);
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
