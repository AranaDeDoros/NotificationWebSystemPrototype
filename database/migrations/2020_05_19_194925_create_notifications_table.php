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
            
            $table->unsignedBigInteger('notificationType');
            $table->unsignedBigInteger('groupId');
            //$table->unsignedBigInteger('notificationStatus');

            $table->unsignedBigInteger('scheduleType');
            $table->string('notificationStatus');
            $table->tinyInteger('attachments')->default(0);


            $table->foreign('notificationType')->references('id')->on('notification_types');
            $table->foreign('groupId')->references('id')->on('groups');
            $table->foreign('scheduleType')->references('id')->on('schedules');

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
