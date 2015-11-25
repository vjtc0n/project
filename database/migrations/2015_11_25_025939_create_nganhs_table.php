<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNganhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nganhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manganh');
            $table->string('tennganh');
            $table->integer('diemchuan');
            $table->integer('truong_id')->unsigned();
            $table->foreign('truong_id')->references('id')->on('truongs')->onDelete('cascade');
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
        Schema::drop('nganhs');
    }
}
