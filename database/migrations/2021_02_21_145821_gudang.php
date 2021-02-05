<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gudang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id')->on('perusahaans')->onDelete('cascade');
            $table->unsignedBigInteger('id_proyek')->unsigned();
            $table->foreign('id_proyek')->references('id')->on('proyeks')->onDelete('cascade');
            $table->unsignedBigInteger('id_parent')->nullable();
            $table->unsignedBigInteger('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id')->on('catatan_transaksi_proyeks')->nullable()->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('satuan')->nullable();
            $table->integer('jumlah');
            $table->enum('jenis', ['Masuk', 'Keluar']);
            $table->timestamps();
            $table->integer('sisa');
            $table->text('keterangan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudangs');
    }
}
