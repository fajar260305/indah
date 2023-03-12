<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('diskon');
            $table->string('kode_invoice')->unique();
            $table->string('nama_pelanggan');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->integer('qty');
            $table->string('status');
            $table->bigInteger('total_harga');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('paket_id')->references('id')->on('pakets');
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
        Schema::dropIfExists('transaksis');
    }
};
