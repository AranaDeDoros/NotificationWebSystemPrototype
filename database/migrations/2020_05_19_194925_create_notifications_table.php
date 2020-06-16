<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('notificationTypeId');
            //$table->unsignedBigInteger('groupId');
            $table->unsignedBigInteger('scheduleTypeId');
            $table->tinyInteger('notificationStatus')->default(1);
            $table->tinyInteger('attachments')->default(0);
            $table->text('customMessage');


            $table->foreign('notificationTypeId')->references('id')->on('notification_types');
            //$table->foreign('groupId')->references('id')->on('groups');
            $table->foreign('scheduleTypeId')->references('id')->on('schedules');

            $table->softDeletes();

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
        Schema::dropIfExists('notifications');
    }
}
