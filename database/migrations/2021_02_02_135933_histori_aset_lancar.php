<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoriAsetLancar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_aset_lancars', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->unsignedBigInteger('id_akun_neraca')->references('id')->on('akun_neraca_saldos')->nullable()->onDelete('cascade');
            $table->double('sisa_saldo', 21, 3);
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaan')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('histori_aset_lancars');
    }
}
