<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiKantor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_kantors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('tgl_transaksi');
            $table->string('nama_transaksi');
            $table->string('keterangan');
            $table->enum('jenis_simpanan', ['Kas', 'Bank']);
            $table->string('jenis_transaksi');
            $table->double('jumlah', 32, 3);
            $table->timestamps();
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaans');
            $table->foreign('id_perusahaan')->references('id')->on('perusahaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_kantors');
    }
}
