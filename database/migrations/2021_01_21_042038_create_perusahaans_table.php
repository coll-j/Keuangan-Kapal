<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
<<<<<<< HEAD
            $table->unsignedBigInteger('pemilik');
            $table->string('kode_perusahaan', 10)->unique();
=======
            $table->unsignedBigInteger('pemilik')->references('id')->on('users');
>>>>>>> da398953e5e77d56d437530d68fda28ad20cd18a
            $table->text('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('telp')->nullable();
            $table->timestamps();
            $table->foreign('pemilik')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaans');
    }
}
