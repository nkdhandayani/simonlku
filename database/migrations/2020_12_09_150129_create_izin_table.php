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
            $table->string('no_izin', 20);
            $table->date('tanggal');
            $table->date('ms_berlaku');
            $table->binary('file_izin');
            $table->integer('sts_verifikasi')->unsigned();
            $table->string('keterangan');
            $table->date('tgl_verifikasi');
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('id_bpw')->references('id_bpw')->on('bpw');
        });

        DB::statement("ALTER TABLE izin MODIFY COLUMN file_izin MEDIUMBLOB");
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
