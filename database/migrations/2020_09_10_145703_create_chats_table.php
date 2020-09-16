<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
       
            $table->increments('id');

            $table->integer('user_in')->unsigned();
            $table->integer('user_out')->unsigned();
            
             $table->foreign('user_in')->references('id')->on('users');

             $table->foreign('user_out')->references('id')->on('users');

            $table->text('message');


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
        Schema::dropIfExists('chats');
    }
}
