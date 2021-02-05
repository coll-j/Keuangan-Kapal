<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatatanTransaksiProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('catatan_transaksi_proyeks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('id_akun_tr_proyek')->unsigned();
            $table->foreign('id_akun_tr_proyek')->references('id')->on('akun_transaksi_proyeks')->onDelete('cascade');
            $table->unsignedBigInteger('id_pemasok')->unsigned()->nullable();
            $table->foreign('id_pemasok')->references('id')->on('pemasoks')->nullable()->onDelete('cascade');
            $table->string('nama_material')->nullable();
            $table->integer('jumlah_material')->nullable();
            $table->string('satuan_material')->nullable();
            $table->unsignedBigInteger('id_proyek')->unsigned();
            $table->foreign('id_proyek')->references('id')->on('proyeks')->onDelete('cascade');
            $table->unsignedBigInteger('id_akun_neraca')->unsigned();
            $table->foreign('id_akun_neraca')->references('id')->on('akun_neraca_saldos')->nullable()->onDelete('cascade');
            $table->double('jumlah', 21, 3);
            $table->double('terbayar', 21, 3);
            $table->double('sisa', 21, 3);
            $table->enum('jenis', ['Utang', 'Piutang', '-']);

            $table->unsignedBigInteger('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id')->on('perusahaans')->onDelete('cascade');
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
        Schema::dropIfExists('catatan_transaksi_proyeks');
        //
    }
}
