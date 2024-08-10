<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamanMultigunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjaman_multiguna', function (Blueprint $table) {
            $table->bigInteger('id_pinjaman')->unsigned()->primary();
            $table->text('keperluan');
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
        Schema::dropIfExists('detail_pinjaman_multiguna');
    }
}