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
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaans');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('jumlah');
            $table->decimal('harga_satuan');
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
        //
    }
}
