<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    protected $table = 'ayah';

    public function peserta()
    {
    	$this->belongsTo('App\Siswa','id_peserta');
    }
}
