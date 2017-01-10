<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKontak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',30);
            $table->string('email',30);
            $table->string('judul',50);
            $table->text('isi');
            $table->enum('dibalas',['0','1'])->default('0');
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
        Schema::dropIfExists('kontak');
    }
}
