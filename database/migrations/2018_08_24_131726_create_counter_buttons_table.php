<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_buttons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial');
            $table->integer('counter_id')->unsigned()->index();
            $table->integer('increment_value');
            $table->foreign('counter_id')->references('id')->on('counters');
//            $table->unique(['button_id', 'counter_id']);
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
        Schema::dropIfExists('counter_buttons');
    }
}
