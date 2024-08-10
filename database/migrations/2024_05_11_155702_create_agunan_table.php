<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agunan', function (Blueprint $table) {
            $table->bigIncrements('id_agunan');
            $table->enum('jenis_agunan', ['SHM', 'SHT', 'AJB', 'KGB']);
            $table->string('nama_pemilik_agunan', 100);
            $table->string('jenis_pengikat', 100);
            $table->decimal('nilai_pengikatan', 15, 2);
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agunan');
    }
}
