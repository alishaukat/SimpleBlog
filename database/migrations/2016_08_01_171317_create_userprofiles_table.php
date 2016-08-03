<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('imageName')->default('notSet');
            $table->string('fullName')->default('notSet');
            $table->string('city')->default('notSet');
            $table->string('country')->default('notSet');
            $table->string('website')->default('notSet');
            $table->string('profession')->default('notSet');
            $table->timestamp('dob');
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
        Schema::drop('userprofiles');
    }
}
