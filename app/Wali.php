<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'wali';

    public function peserta()
    {
    	$this->belongsTo('App\Siswa','id_peserta');
    }
}
