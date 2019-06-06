<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id_surat');
            $table->string('image');
            $table->string('no_surat');
            $table->string('perihal_surat');
            $table->timestamp('tanggal_surat', 0)->nullable();

            //foreign key dari pimpinan
            $table->integer('id_pimpinan')->unsigned()->index()->nullable();
            $table->foreign('id_pimpinan')->references('id_pimpinan')->on('pimpinans');

            //foreign key dari staf
            $table->integer('id_staf')->unsigned()->index()->nullable();
            $table->foreign('id_staf')->references('id_staf')->on('stafs');

            //foreign key dari sektor
            $table->integer('id_sektor')->unsigned()->index()->nullable();
            $table->foreign('id_sektor')->references('id_sektor')->on('sektors');

            //foreign key dari instansi
            $table->integer('id_instansi')->unsigned()->index()->nullable();
            $table->foreign('id_instansi')->references('id_instansi')->on('instansis');

            //1 = unggah
            //2 = tinjau
            //3 = disposisi
            //4 = arsip
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}