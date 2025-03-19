<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->decimal('total_pembayaran', 10, 2);
            $table->string('metode_pembayaran');
            $table->string('layanan_dipesan');
            $table->dateTime('waktu_pemesanan');
            $table->string('status');
            $table->string('bukti_transfer')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
