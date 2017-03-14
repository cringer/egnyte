<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactNotifyGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_notify_group', function (Blueprint $table) {
            $table->integer('contact_id')->unsigned();
            $table->integer('notify_group_id')->unsigned();

            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');

            $table->foreign('notify_group_id')
                ->references('id')
                ->on('notify_groups');

            $table->primary(['contact_id', 'notify_group_id']);
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
