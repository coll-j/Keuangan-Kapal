<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunTransaksiProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun_transaksi_proyeks', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaans')->onDelete('cascade');
            $table->string('nama')->unique();
            $table->enum('jenis', ['Masuk', 'Keluar']);
            $table->enum('jenis_neraca', ['Aset Lancar', 'Aset Tetap', 'Kewajiban Lancar', 'Kewajiban Panjang', 'Ekuitas']);

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
        Schema::dropIfExists('akun_transaksi_proyeks');
    }
}
