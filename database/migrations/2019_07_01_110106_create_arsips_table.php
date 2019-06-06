<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->increments('id_arsip');
            $table->timestamp('tanggal_arsip', 0)->nullable();

            //foreign key dari pimpinan
            $table->integer('id_pimpinan')->unsigned()->index()->nullable();
            $table->foreign('id_pimpinan')->references('id_pimpinan')->on('pimpinans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsips');
    }
}
