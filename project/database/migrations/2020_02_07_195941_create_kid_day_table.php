<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kid_day', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('kid_id');
			$table->integer('day_id');
			$table->boolean('isPresent')->default(0);
			$table->boolean('hasPaid')->default(0);
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
        Schema::dropIfExists('kid_day');
    }
}
