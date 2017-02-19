<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskListTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_list_task', function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->integer('task_list_id')->unsigned();

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');

            $table->foreign('task_list_id')
                ->references('id')
                ->on('tasks_lists');

            $table->primary(['task_id', 'task_list_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_list_task');
    }
}
