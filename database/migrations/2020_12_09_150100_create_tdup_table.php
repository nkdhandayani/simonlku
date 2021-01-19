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
            $table->string('no_tdup', 20);
            $table->date('tanggal');
            $table->date('ms_berlaku');
            $table->binary('file_tdup');
            $table->integer('sts_verifikasi')->unsigned();
            $table->string('keterangan');
            $table->date('tgl_verifikasi');
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('id_bpw')->references('id_bpw')->on('bpw');
        });

        DB::statement("ALTER TABLE tdup MODIFY COLUMN file_tdup MEDIUMBLOB");
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
