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
        Schema::create('Gudang', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('jumlah');
            $table->decimal('harga_satuan');
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
