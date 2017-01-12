<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->integer('id_peserta')->unsigned()->primary('id_peserta');
            $table->string('nama',50);
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('id_peserta')
                  ->references('id')
                  ->on('peserta')
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
        Schema::dropIfExists('sekolah');
    }
}
