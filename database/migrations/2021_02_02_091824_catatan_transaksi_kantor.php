<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatatanTransaksiKantor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_transaksi_kantors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('tgl_transaksi');
            $table->unsignedBigInteger('id_akun_tr_kantor')->references('id')->on('akun_transaksi_kantors')->onDelete('cascade');
            $table->string('keterangan');
            $table->unsignedBigInteger('id_akun_neraca')->references('id')->on('akun_neraca_saldos')->nullable()->onDelete('cascade');
            $table->double('jumlah', 32, 3);

            $table->timestamps();
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catatan_transaksi_kantors');
    }
}
