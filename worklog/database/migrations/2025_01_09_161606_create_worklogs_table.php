<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_tasks', function (Blueprint $table) {
            $table->id();
            $table->enum('task_type', ['Development', 'Test', 'Document']);
            $table->string('task_name');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->enum('status', ['In Progress', 'Completed', 'Cancelled']);
            $table->timestamps(); // This will create 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_tasks');
    }
}
