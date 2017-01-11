<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['nama'];

    public function peserta()
    {
    	return $this->hasMany('App\Peserta','id_jurusan');
    }
}
