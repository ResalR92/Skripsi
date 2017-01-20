<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'user_id',
        'id_jurusan',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'telepon',
        'no_hp',
        'tahun_lulus',
        'foto',
        'id_status',
    ];

    protected $dates = ['tanggal_lahir'];

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

    public function ayah()
    {
        return $this->hasOne('App\Ayah','id_peserta');
    }

    public function ibu()
    {
        return $this->hasOne('App\Ibu','id_peserta');
    }

    public function wali()
    {
        return $this->hasOne('App\Wali','id_peserta');
    }

    public function status()
    {
        return $this->belongsTo('App\Status','id_status');
    }
}
