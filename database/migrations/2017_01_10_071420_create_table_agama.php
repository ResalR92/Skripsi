<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agama', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',15);
            $table->timestamps();
        });
        Schema::table('peserta',function(Blueprint $table){
            $table->foreign('id_agama')
                  ->references('id')
                  ->on('agama')
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
            $table->dropForeign('peserta_id_agama_foreign');
        });
        Schema::dropIfExists('agama');
    }
}
