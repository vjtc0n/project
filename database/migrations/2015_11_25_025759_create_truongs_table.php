<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matr');
            $table->string('tentr');
            $table->integer('nhanvienquanly_user_id')->unsigned();
            $table->foreign('nhanvienquanly_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('truongs');
    }
}
