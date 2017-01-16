<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',20);
            $table->string('label',10);
            $table->timestamps();
        });
        Schema::table('peserta',function(Blueprint $table){
            $table->foreign('id_status')
                  ->references('id')
                  ->on('status')
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
            $table->dropForeign('peserta_id_status_foreign');
        });
        Schema::dropIfExists('status');
    }
}
