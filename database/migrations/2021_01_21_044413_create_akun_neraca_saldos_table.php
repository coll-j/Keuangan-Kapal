<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunNeracaSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('akun_neraca_saldos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaans')->onDelete('cascade');
            $table->string('nama')->unique();
            $table->double('saldo', 21, 3);
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
        Schema::dropIfExists('akun_neraca_saldos');
    }
}
