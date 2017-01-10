<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->timestamps();
        });

        Schema::table('peserta',function(Blueprint $table){
            $table->foreign('id_jurusan')
                  ->references('id')
                  ->on('jurusan')
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
        Schema::table('peserta',function(Blueprint $table){
            $table->dropForeign('peserta_id_jurusan_foreign');
        });
        Schema::dropIfExists('jurusan');
    }
}
