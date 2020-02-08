<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
			$table->increments('id');
			$table->string('image')->nullable();
			$table->string('name');
			$table->string('first_name');
			$table->date('birthday');
			$table->string('extra_info')->nullable();
			$table->boolean('isVeggie')->default(0);
			$table->string('allergies')->nullable();
			$table->string('phone_nr')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('address_id')->nullable();
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
        Schema::dropIfExists('monitors');
    }
}
