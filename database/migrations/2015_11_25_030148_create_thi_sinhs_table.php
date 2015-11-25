<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThiSinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thi_sinhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('gioitinh');
            $table->string('namsinh');
            $table->string('quequan');
            $table->string('khuvuc');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('thi_sinhs');
    }
}
