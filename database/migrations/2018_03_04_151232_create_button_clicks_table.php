<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('button_clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('button_id')->unsigned()->index();
            $table->foreign('button_id')->references('id')->on('buttons');
            $table->integer('button_type_id')->unsigned()->index();
            $table->foreign('button_type_id')->references('id')->on('button_types');
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
//            $table->date('date')->default(\Carbon\Carbon::now('Y-m-d'));
//            $table->time('time')->default(\Carbon\Carbon::now('H:i:s'));
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
        Schema::dropIfExists('button_clicks');
    }
}
