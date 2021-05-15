<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createalltable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cpf')->unique();
            $table->string('remember_token')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('avatar')->nullable();
            $table->string('permission')->nullable();
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });
        Schema::create('deposit', function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->string('amount');
            $table->datetime('created_at');

        });
        Schema::create('wallet', function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->string('name');
            $table->string('url');

        });
        Schema::create('verified', function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->string('front_doc');
            $table->string('back_doc');
            $table->string('frontuser');

        });
        Schema::create('balance', function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->string('values');

        });
        Schema::create('withdraw', function(Blueprint $table){
            $table->id();
            $table->integer('id_verified');
            $table->string('amount');
            $table->datetime('request_date');
            $table->datetime('approval')->nullable();
     

        });
        Schema::create('profitability', function(Blueprint $table){
            $table->id();
            $table->integer('id_deposit');
            $table->string('amount');
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
        Schema::dropIfExists('deposit');
        Schema::dropIfExists('wallet');
        Schema::dropIfExists('verified');
        Schema::dropIfExists('balance');
        Schema::dropIfExists('withdraw');
        Schema::dropIfExists('profitability');

    }
}
