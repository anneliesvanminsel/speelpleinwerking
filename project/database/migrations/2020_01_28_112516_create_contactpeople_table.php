<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactpeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactpeople', function (Blueprint $table) {
            $table->increments('id');
			$table->string('image');
			$table->string('first_name');
			$table->string('name');
			$table->string('phone_nr');
			$table->string('mailaddress');
			$table->string('role');
			$table->integer('monitor_id');
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
        Schema::dropIfExists('contactpeople');
    }
}
