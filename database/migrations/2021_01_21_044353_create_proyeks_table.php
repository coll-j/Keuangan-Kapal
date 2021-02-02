<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('kode_proyek');
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaans')->onDelete('cascade');
            $table->unsignedBigInteger('id_pemilik')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['Aktif', 'Selesai']);
            $table->string('jenis');
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
        Schema::dropIfExists('proyeks');
    }
}
