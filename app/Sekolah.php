<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    //table sekolah
    protected $table = 'sekolah';
    //menentukan primary key -> karena tidak memiliki ID 
    protected $primaryKey = 'id_peserta';
    //mass assignment
    protected $fillable = [
    	'id_peserta',
    	'nama',
    	'alamat',
    ];
    //relasi one to one -> Peserta memiliki 1 Sekolah
    public function peserta()
    {
    	return $this->belongsTo('App\Peserta','id_peserta');
    }

    //Accessor -> nama sekolah
    public function getNamaAttribute($nama)
    {
        return strtoupper($nama);
    }
    //Mutator -> nama sekolah -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = trim(strtolower($nama));
    }

    //Accessor -> alamat
    public function getAlamatAttribute($alamat)
    {
        return ucwords($alamat);
    }
    //Mutator -> alamat -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setAlamatAttribute($alamat)
    {
        $this->attributes['alamat'] = trim(strtolower($alamat));
    }
}
