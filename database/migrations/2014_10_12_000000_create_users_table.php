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
            $table->string('genre');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->string('prenom');
            $table->string('nom');
            $table->string('ddn');
            $table->tinyInteger('isvalide')->default(0);
            $table->string('avatar')->default(0);
            $table->tinyInteger('haveavatar')->default(0);
            $table->string('mobile')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('datapaypals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('country');
            $table->string('carte');
            $table->string('numero');
            $table->string('date');
            $table->string('crypto');
            $table->string('prenom');
            $table->string('nom');
            $table->string('adresse1');
            $table->string('adresse2');
            $table->string('postal');
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
        Schema::dropIfExists('datapaypals');
    }
}
