<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin', function (Blueprint $table) {
            $table->increments('id_izin')->unsigned();;
            $table->unsignedInteger('id_bpw');
            $table->unsignedInteger('id_user');
            $table->string('no_izin', 50);
            $table->date('tgl_izin');
            $table->string('file_izin', 100);
            $table->integer('sts_verifikasi')->unsigned();
            $table->string('keterangan')->nullable();
            $table->date('tgl_verifikasi')->nullable();
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
        Schema::dropIfExists('izin');
    }
}
