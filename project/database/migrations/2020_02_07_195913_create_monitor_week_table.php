<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorWeekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitor_week', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('monitor_id');
			$table->integer('week_id');
			$table->boolean('wantsIntern');
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
        Schema::dropIfExists('monitor_week');
    }
}
