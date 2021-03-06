<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_manager', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('pekerjaan_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('apply_manager',function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apply_manager');
    }
}
