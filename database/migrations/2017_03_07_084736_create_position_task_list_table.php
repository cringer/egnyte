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
            $table->integer('task_list_id')->unsigned();
            $table->integer('position_id')->unsigned();

            $table->foreign('task_list_id')
                ->references('id')
                ->on('task_lists');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions');

            $table->primary(['task_list_id', 'position_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_task_list');
    }
}
