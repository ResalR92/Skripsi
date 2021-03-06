<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWali extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali', function (Blueprint $table) {
            $table->integer('id_peserta')->unsigned()->primary('id_peserta');
            $table->string('nama',30)->nullable();
            $table->string('tempat_lahir',20)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama',20)->nullable();
            $table->string('pendidikan',20)->nullable();
            $table->string('pekerjaan',20)->nullable();
            $table->string('gaji',20)->nullable();
            $table->string('telepon')->nullable();
            $table->string('no_hp')->nullabel();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('wali');
    }
}
