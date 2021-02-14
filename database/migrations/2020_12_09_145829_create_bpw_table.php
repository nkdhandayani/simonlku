<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBpwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpw', function (Blueprint $table) {
            $table->increments('id_bpw')->unsigned();;
            $table->unsignedInteger('id_user');
            $table->string('nm_bpw', 50);
            $table->string('username', 20)->unique();
            $table->string('password', 60);
            $table->string('email', 50);
            $table->string('alamat');
            $table->enum('kabupaten', ["Kota Denpasar", "Badung", "Gianyar", "Bangli", "Tabanan", "Jembrana", "Buleleng", "Klungkung", "Karangasem"]);
            $table->string('no_telp', 15);
            $table->string('no_fax', 15)->nullable();
            $table->string('nm_pic', 50);
            $table->string('nm_pimpinan', 50);
            $table->enum('jns_bpw', ["BPW", "MICE", "Lanjut Usia"]);
            $table->enum('sts_kantor', ["Hak Pribadi", "Kontrak"]);
            $table->string('nib', 20);
            $table->string('foto_bpw', 100)->nullable();
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpw');
    }
}
