<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Games extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('TheLoai');
            $table->string('KichThuoc');
            $table->integer('SoPart');
            $table->integer('SoLuotXem')->default(0);
            $table->string('AnhChinh');
            $table->string('AnhPhu1');
            $table->string('AnhPhu2');
            $table->string('AnhPhu3');
            $table->string('AnhPhu4');
            $table->text('GioiThieu');
            $table->text('NoiDung')->nullable();
            $table->text('LinkGame');        
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
        Schema::dropIfExists('games');
    }
}
