<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
	//table -> pengumuman
    protected $table = 'pengumuman';
    //mass assignment
    protected $fillable = ['judul','isi'];

    //Accessor -> judul
    public function getJudulAttribute($judul)
    {
        return ucwords($judul);
    }
    //Mutator -> judul -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setJudulAttribute($judul)
    {
        $this->attributes['judul'] = trim(strtolower($judul));
    }
}
