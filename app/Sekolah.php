<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    protected $primaryKey = 'id_peserta';

    protected $fillable = [
    	'id_peserta',
    	'nama',
    	'alamat',
    ];

    public function peserta()
    {
    	return $this->belongsTo('App\Peserta','id_peserta');
    }
}
