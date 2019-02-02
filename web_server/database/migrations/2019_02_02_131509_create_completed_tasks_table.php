<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_tasks', function (Blueprint $table) {
            $table->increments('completed_task_id');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('house_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            // $table->foreign('task_id')->references('task_id')->on('tasks');
            // $table->foreign('house_id')->references('house_id')->on('houses');
            // $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_tasks');
    }
}
