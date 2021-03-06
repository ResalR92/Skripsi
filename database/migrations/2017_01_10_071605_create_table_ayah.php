<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAyah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayah', function (Blueprint $table) {
            $table->integer('id_peserta')->unsigned()->primary('id_peserta');
            $table->string('nama',30);
            $table->string('tempat_lahir',20);
            $table->date('tanggal_lahir');
            $table->string('agama',20);
            $table->string('pendidikan',20);
            $table->string('pekerjaan',20);
            $table->string('gaji',20)->nullable();
            $table->string('telepon')->nullable();
            $table->string('no_hp')->nullabel();
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
        Schema::dropIfExists('ayah');
    }
}
