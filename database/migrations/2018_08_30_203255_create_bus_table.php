<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bu_name');
            $table->string('bu_price');
            $table->integer('bu_rent');
            $table->string('bu_square');            
            $table->integer('bu_type');
            $table->string('bu_small_ds');            
            $table->string('bu_meta');            
            $table->string('bu_langtude');            
            $table->string('bu_latitude');            
            $table->longtext('bu_large_ds');            
            $table->integer('bu_status');            
            $table->integer('rooms');            
            $table->string('image');            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');            
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
        Schema::dropIfExists('bus');
    }
}
