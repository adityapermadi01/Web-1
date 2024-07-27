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
        Schema::create('pasaranyars', function (Blueprint $table) {
            $table->id('id_pasaranyar');
            $table->String('tanggal');
            $table->String('kode');
            $table->String('harga');
            $table->String('nama_langganan');
            $table->text('stok');
            $table->integer('id_barang');
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
        Schema::dropIfExists('pasaranyars');
    }
};
