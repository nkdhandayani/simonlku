<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user')->unsigned();
            $table->string('username', 20)->unique();
            $table->string('password', 60);
            $table->string('nm_user', 50);
            $table->string('nik', 20);
            $table->string('email', 50);
            $table->string('no_telp', 15);
            $table->enum('jns_kelamin', ["Laki-laki", "Perempuan"]);
            $table->string('foto_user', 100)->nullable();
            $table->integer('level')->unsigned();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('users');
    }
}
