<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamanKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjaman_kendaraan', function (Blueprint $table) {
            $table->bigInteger('id_pinjaman')->unsigned()->primary();
            $table->string('tipe_kendaraan', 100);
            $table->string('merk_kendaraan', 100);
            $table->year('tahun_pembuatan');
            $table->foreign('id_pinjaman')->references('id_pinjaman')->on('pinjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pinjaman_kendaraan');
    }
}