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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->String('kode');
            $table->String('bulan1');
            $table->String('bulan2');
            $table->String('bulan3');
            $table->String('bulan4');
            $table->String('bulan5');
            $table->String('bulan6');
            $table->String('bulan7');
            $table->String('bulan8');
            $table->String('bulan9');
            $table->String('bulan10');
            $table->String('bulan11');
            $table->String('bulan12');
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
        Schema::dropIfExists('laporans');
    }
};
