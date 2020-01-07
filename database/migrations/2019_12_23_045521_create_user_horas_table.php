<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_horas', function (Blueprint $table) {
            $table->engine = 'InnoDB';  
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('horas_id')->unsigned();            
            $table->foreign('horas_id')->references('id')->on('horas');
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
        Schema::dropIfExists('user_horas');
    }
}
