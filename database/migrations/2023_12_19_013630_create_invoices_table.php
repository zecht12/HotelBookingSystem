<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('namaPemesan');
            $table->date('checkIn');
            $table->date('checkOut');
            $table->string('nama_kamar');
            $table->integer('jumlahKamar');
            $table->integer('hargaKamar');
            $table->integer('totalHarga')->nullable();
            $table->string('status')->default('Berhasil Di checkout tapi belum di checkIn');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
