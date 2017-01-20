<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'wali';

    protected $primaryKey = 'id_peserta';

    protected $fillable = [
    	'id_peserta',
    	'nama',
    	'tempat_lahir',
    	'tanggal_lahir',
        'agama',
    	'pendidikan',
    	'pekerjaan',
    	'gaji',
    	'telepon',
    	'no_hp',
    	'alamat',
    ];

    protected $dates = ['tanggal_lahir'];

    public function peserta()
    {
    	$this->belongsTo('App\Siswa','id_peserta');
    }

    // public function getGajiAttribute($gaji)
    // {
    //     $gaji = $this->attributes['gaji'];
    //     if(!empty($gaji)){
    //         return $gaji = sprintf('Rp %s', number_format($gaji, 2));
    //     }
    //     return '-';
    // }
}
