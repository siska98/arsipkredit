<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamanPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjaman_pendidikan', function (Blueprint $table) {
            $table->bigInteger('id_pinjaman')->unsigned()->primary();
            $table->string('jenjang_pendidikan', 100);
            $table->string('institusi_pendidikan', 100);
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
        Schema::dropIfExists('detail_pinjaman_pendidikan');
    }
}