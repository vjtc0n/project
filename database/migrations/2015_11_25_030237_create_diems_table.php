<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sbd');
            $table->float('mon1');
            $table->float('mon2');
            $table->float('mon3');
            $table->float('diemtong');
            $table->string('khoi');
            $table->integer('thisinh_id')->unsigned();
            $table->foreign('thisinh_id')->references('id')->on('thi_sinhs')->onDelete('cascade');
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
        Schema::drop('diems');
    }
}
