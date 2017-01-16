<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = ['nama','label'];

    public function peserta()
    {
    	return $this->hasMany('App\Peserta','id_status');
    }
}
