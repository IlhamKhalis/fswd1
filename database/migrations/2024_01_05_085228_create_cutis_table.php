<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan_id', 20); // sesuaikan panjang dengan kolom 'nomor_induk' di tabel 'karyawan'
            $table->date('tanggal_cuti');
            $table->integer('lama_cuti');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('karyawan_id')->references('nomor_induk')->on('karyawan'); // merujuk ke 'nomor_induk', bukan 'id'
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
