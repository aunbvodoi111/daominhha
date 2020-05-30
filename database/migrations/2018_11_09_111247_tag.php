<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TagName');
            $table->integer('id_TheLoai')->unsigned();
            $table->foreign('id_TheLoai')->references('id')->on('theloai');
            $table->integer('id_Games')->unsigned();
            $table->foreign('id_Games')->references('id')->on('games');
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
        //
        Schema::dropIfExists('tag');
    }
}
