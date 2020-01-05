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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->boolean('accepted');

             $table->integer('id_privileges')->unsigned();
             $table->integer('id_user')->unsigned()->nullable(); // se refiere al id del medico o office o paciente
             



            $table->foreign('id_privileges')->references('id')->on('user_privileges')->onDelete('cascade')->onUpdate('cascade');

            //$table->timestamp('email_verified_at')->nullable();
            

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
