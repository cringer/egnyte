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
            $table->integer('position_id');
            $table->integer('task_list_id');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions');

            $table->foreign('task_list_id')
                ->references('id')
                ->on('tasks_lists');

            $table->primary(['position_id', 'task_list_id']);
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
