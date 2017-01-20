<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    protected $table = 'ayah';

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

    public function getGajiAttribute($gaji)
    {
        return $this->attributes['gaji'] = sprintf('Rp %s', number_format($gaji, 2));
    }
}
