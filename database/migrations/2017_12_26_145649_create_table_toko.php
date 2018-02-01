<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_toko');
            $table->timestamps();
        });

        Schema::table('resi', function (Blueprint $table){
            $table  ->foreign('id_toko')
                    ->references('id')
                    ->on('toko')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resi', function (Blueprint $table){
            $table->dropForeign('resi_id_toko_foreign');
        });
        Schema::drop('toko');
    }
}
