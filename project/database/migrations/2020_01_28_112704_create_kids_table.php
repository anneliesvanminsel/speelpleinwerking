<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kids', function (Blueprint $table) {
			$table->increments('id');
			$table->string('image')->nullable();
			$table->string('first_name');
			$table->string('name');
			$table->date('birthday');
			$table->string('allergies')->nullable();
			$table->boolean('canSwim')->default(0);
			$table->boolean('hasTetanusShot')->default(0);
			$table->date('tetanus_date')->nullable();
			$table->string('medicins')->nullable();
			$table->string('doc_name');
			$table->string('doc_phone_nr');
			$table->string('info')->nullable();
			$table->integer('family_id');
			$table->boolean('isActive')->default(1);
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
        Schema::dropIfExists('kids');
    }
}
