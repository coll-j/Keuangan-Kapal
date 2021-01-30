<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_proyeks', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('tgl_transaksi');
            $table->string('nama_transaksi');
            $table->string('nama_pemasok')->nullable();
            $table->string('nama_proyek')->nullable();
            $table->string('jenis_proyek')->nullable();
            $table->enum('jenis_simpanan', ['Kas', 'Bank']);
            $table->string('jenis_transaksi');
            $table->double('jumlah', 32, 3);
            $table->double('dibayar_diterima', 32, 3);
            $table->double('sisa', 32, 3);
            $table->enum('utang_piutang', ['Utang', 'Piutang'])->nullable();
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
        Schema::dropIfExists('transaksi_proyeks');
    }
}
