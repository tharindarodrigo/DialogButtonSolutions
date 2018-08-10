<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counter_category_id')->unsigned();
            $table->string('title');
            $table->integer('count');
            $table->integer('max')->nullable();
            $table->integer('min')->default(0);
            $table->timestamps();

            $table->foreign('counter_category_id')->references('id')->on('counter_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}
