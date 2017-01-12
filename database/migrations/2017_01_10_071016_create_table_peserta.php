<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('id_jurusan')->unsigned();
            $table->string('nama',30);
            $table->string('tempat_lahir',20);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('agama',20);
            $table->text('alamat');
            $table->string('telepon')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('tahun_lulus');
            $table->string('foto');
            $table->boolean('verifikasi')->default(false);
            $table->boolean('lulus')->default(false);
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
        Schema::dropIfExists('peserta');
    }
}
