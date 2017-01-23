<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosedur extends Model
{
	//table prosedur
    protected $table = 'prosedur';
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
