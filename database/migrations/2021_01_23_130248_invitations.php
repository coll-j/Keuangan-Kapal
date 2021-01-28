<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invitation', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->string('email');
            $table->integer('role');
            $table->unsignedBigInteger('id_perusahaan')->references('id')->on('perusahaan')->nullable()->onDelete('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('invitation');

    }
}
