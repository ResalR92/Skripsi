<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan','id_jurusan');
    }
}
