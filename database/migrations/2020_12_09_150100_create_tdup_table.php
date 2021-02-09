<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdup', function (Blueprint $table) {
            $table->increments('id_tdup')->unsigned();;
            $table->unsignedInteger('id_bpw');
            $table->unsignedInteger('id_user');
            $table->string('no_tdup', 20);
            $table->date('tanggal');
            $table->string('file_tdup', 100);
            $table->integer('sts_verifikasi')->unsigned();
            $table->string('keterangan');
            $table->date('tgl_verifikasi');
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('id_bpw')->references('id_bpw')->on('bpw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tdup');
    }
}
