<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('identifier');
            $table->integer('battery_level');
            $table->string('message')->nullable();
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('button_type_id')->unsigned()->index();
            $table->foreign('button_type_id')->references('id')->on('button_types');

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
        Schema::dropIfExists('buttons');
    }
}
