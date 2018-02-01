<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resi', function (Blueprint $table) {
            $table->string('noresi','7')->unique();
            $table->date('tanggal_resi');
            $table->integer('id_toko')->unsigned();
            $table->string('nama_konsumen','20');
            $table->string('hp_konsumen','13');
            $table->string('provinsi','40');
            $table->string('alamat','40');
            $table->enum('ekpedisi', ['TIKI','JNE','J&T','POS']);
            $table->double('ongkir');
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
        Schema::drop('resi');
    }
}
