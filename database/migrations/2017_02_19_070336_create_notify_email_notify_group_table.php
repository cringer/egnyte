<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifyEmailNotifyGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_email_notify_group', function (Blueprint $table) {
            $table->integer('notify_email_id')->unsigned();
            $table->integer('notify_group_id')->unsigned();

            $table->foreign('notify_email_id')
                ->references('id')
                ->on('notify_emails');

            $table->foreign('notify_group_id')
                ->references('id')
                ->on('notify_groups');

            $table->primary(['notify_email_id', 'notify_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notify_email_notify_group');
    }
}
