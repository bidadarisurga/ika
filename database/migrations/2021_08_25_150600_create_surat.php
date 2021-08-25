<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->integer('no_adm');
            $table->date('tgl_adm');
            $table->string('distribusi');
            $table->string('tindak_lanjut');
            $table->enum('status',['Tidak Dapat Diproses','Belum Diproses','Dalam Proses','Selesai']);
            $table->enum('sifat',['Biasa','Rahasia','Segera','Penting']);
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
        Schema::dropIfExists('surat');
    }
}
