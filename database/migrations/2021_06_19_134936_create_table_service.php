<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('nama_barang');
            $table->string('tgl_masuk');
            $table->string('nama_customer');
            $table->string('telp');
            $table->longText('keluhan');
            $table->longText('kelengkapan');
            $table->string('tgl_keluar')->nullable();
            $table->string('nama_pengambil')->nullable();
            $table->longText('part_diganti')->nullable();
            $table->string('biaya')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('flag');

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
        Schema::dropIfExists('table_service');
    }
}
