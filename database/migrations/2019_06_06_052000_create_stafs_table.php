<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stafs', function (Blueprint $table) {
            $table->increments('id_staf');
            $table->timestamps();

            //foreign key sektor
            $table->integer('id_sektor')->unsigned()->index()->nullable();
            $table->foreign('id_sektor')->references('id_sektor')->on('sektors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stafs');
    }
}
