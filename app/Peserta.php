<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan','id_jurusan');
    }
    public function sekolah()
    {
    	return $this->hasOne('App\Sekolah','id_peserta');
    }
}
