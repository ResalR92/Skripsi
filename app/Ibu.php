<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    protected $table = 'ibu';

    public function peserta()
    {
    	$this->belongsTo('App\Siswa','id_peserta');
    }
}
