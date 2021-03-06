<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_event', function (Blueprint $table) {
            $table->engine = 'InnoDB';  
            $table->Increments('id');
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('event_id')->unsigned();            
            $table->foreign('event_id')->references('id')->on('events');
            $table->integer('mes');
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
        Schema::dropIfExists('user_event');
    }
}
