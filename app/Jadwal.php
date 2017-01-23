<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
	//table jadwal
    protected $table = 'jadwal';
    //mass assignment
    protected $fillable = ['kegiatan','awal','akhir'];
    //carbon
    protected $dates = ['awal','akhir'];

    //Accessor -> kegiatan
    public function getKegiatanAttribute($kegiatan)
    {
        return ucwords($kegiatan);
    }
    //Mutator -> kegiatan -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setKegiatanAttribute($kegiatan)
    {
        $this->attributes['kegiatan'] = trim(strtolower($kegiatan));
    }
}
