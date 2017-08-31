<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionTaskListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_task_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('task_list_id')->unsigned()->nullable();

            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('task_list_id')->references('id')->on('task_lists');

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
        Schema::drop('position_task_list');
    }
}
