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
            $table->bigIncrements('surat_id');
            $table->string('no_surat');
            $table->string('perihal_surat');
            $table->string('pengirim_surat');
            $table->string('tujuan_surat');
            $table->string('tanggal_pembuatan_surat');
            $table->string('jenis_surat');
            $table->string('pengunggah_surat');
            $table->string('status_surat')->default('1');
            
            //1 = unggah
            //2 = tinjau
            //3 = disposisi
            //4 = arsip

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
        Schema::dropIfExists('surats');
    }
}
