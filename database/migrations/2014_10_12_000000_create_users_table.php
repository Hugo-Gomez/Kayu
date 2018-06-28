<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string("pwd_salt")->nullable(true);
            $table->boolean("palmOil")->default(true);
            $table->integer("caloriesMax")->nullable(true);
            $table->string("salt")->default('low');
            $table->string("sugar")->default('low');
            $table->string("fat")->default('low');
            $table->string("saturedFat")->default('low');
            $table->string("additives")->default('dangerous');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
