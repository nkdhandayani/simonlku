<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lku', function (Blueprint $table) {
            $table->increments('id_lku')->unsigned();;
            $table->unsignedInteger('id_tdup');
            $table->unsignedInteger('id_izin');
            $table->string('no_surat', 20);
            $table->string('tahun', 4);
            $table->enum('periode', ["I", "II"]);
            $table->binary('file_lku');
            $table->integer('sts_verifikasi')->unsigned();
            $table->string('keterangan');
            $table->date('tgl_verifikasi');
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('id_tdup')->references('id_tdup')->on('tdup');
            $table->foreign('id_izin')->references('id_izin')->on('izin');
        });

        DB::statement("ALTER TABLE lku MODIFY COLUMN file_lku MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lku');
    }
}
