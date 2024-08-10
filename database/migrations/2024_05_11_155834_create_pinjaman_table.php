<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->bigIncrements('id_pinjaman');
            $table->unsignedBigInteger('id_produk');
            $table->string('nama_peminjam', 100);
            $table->unsignedBigInteger('id_agunan')->nullable();
            $table->foreign('id_produk')->references('id_produk')->on('produk_pinjaman');
            $table->foreign('id_agunan')->references('id_agunan')->on('agunan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
