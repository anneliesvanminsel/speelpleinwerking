<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
			$table->string('image')->nullable();
			$table->string('name');
			$table->string('first_name');
			$table->date('birthday');
			$table->string('phone_nr')->nullable();
			$table->string('introtext')->nullable();
			$table->string('extrainfo')->nullable();
			$table->boolean('isVeggie')->default(0);
			$table->boolean('hasAllergies')->default(0);
			$table->string('allergies')->nullable();
			$table->boolean('isActive')->default(1);
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
        Schema::dropIfExists('admins');
    }
}
