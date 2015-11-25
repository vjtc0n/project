<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangKisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_kis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thisinh_id')->unsigned();
            $table->foreign('thisinh_id')->references('id')->on('thi_sinhs')->onDelete('cascade');
            $table->integer('nganh_id')->unsigned();
            $table->foreign('nganh_id')->references('id')->on('nganhs')->onDelete('cascade');
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
        Schema::drop('dang_kis');
    }
}
