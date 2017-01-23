<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
	//table kontak
    protected $table = 'kontak';
    //mass assignment
    protected $fillable = ['nama','email','judul','isi','dibalas'];

    //Accessor -> nama kontak
    public function getNamaAttribute($nama)
    {
        return ucwords($nama);
    }
    //Mutator -> nama kontak -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = trim(strtolower($nama));
    }

    //Mutator->email
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = trim(strtolower($email));
    }

    //Accessor -> judul
    public function getJudulAttribute($judul)
    {
        return ucwords($judul);
    }
    //Mutator -> judul
    public function setJudulAttribute($judul)
    {
        $this->attributes['judul'] = trim(strtolower($judul));
    }
}
