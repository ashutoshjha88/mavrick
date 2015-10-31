<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('confirmation_code', 255);
            $table->unsignedTinyInteger('confirmed')->default(1);
            $table->unsignedTinyInteger('admin')->default(0);
            $table->string('address');
            $table->string('mobile', 20);
            $table->string('zip_code', 30);
            $table->string('city', 30);
            $table->string('state', 35);
            $table->unsignedInteger('country_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
