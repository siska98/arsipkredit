<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamanKurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjaman_kur', function (Blueprint $table) {
            $table->bigInteger('id_pinjaman')->unsigned()->primary();
            $table->string('jenis_usaha', 100);
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
        Schema::dropIfExists('detail_pinjaman_kur');
    }
}
