<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnggaranProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_proyek', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_akun_tr_proyek')->references('id')->on('akun_transaksi_proyeks')->onDelete('cascade');
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaan')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('id_proyek')->references('id')->on('proyeks')->onDelete('cascade');
            $table->double('nominal', 21, 3);          
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
        Schema::dropIfExists('anggaran_proyek');
        //
    }
}
