<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    //table peserta
    protected $table = 'peserta';
    //mass assignment
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
    //carbon
    protected $dates = ['tanggal_lahir'];
    //relasi one to one -> User/Akun memiliki satu Biodata
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    //relasi one to many -> Jurusan memilki banyak Peserta
    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan','id_jurusan');
    }
    //relasi one to one -> Peserta memiliki 1 Sekolah
    public function sekolah()
    {
    	return $this->hasOne('App\Sekolah','id_peserta');
    }
    //relasi one to one -> Peserta memiliki 1 Ayah
    public function ayah()
    {
        return $this->hasOne('App\Ayah','id_peserta');
    }
    //relasi one to one -> Peserta memiliki 1 Ibu
    public function ibu()
    {
        return $this->hasOne('App\Ibu','id_peserta');
    }
    //relasi one to one -> Peserta memiliki 1 Wali
    public function wali()
    {
        return $this->hasOne('App\Wali','id_peserta');
    }
    //relasi one to many -> Status memiliki banyak Peserta
    public function status()
    {
        return $this->belongsTo('App\Status','id_status');
    }



    //Accessor -> nama
    public function getNamaAttribute($nama)
    {
        return strtoupper($nama);
    }
    //Mutator -> nama -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = trim(strtolower($nama));
    }

    //Accessor -> tempat lahir
    public function getTempatLahirAttribute($tempat_lahir)
    {
        return ucwords($tempat_lahir);
    }
    //Mutator -> tempat lahir -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setTempatLahirAttribute($tempat_lahir)
    {
        $this->attributes['tempat_lahir'] = trim(strtolower($tempat_lahir));
    }
    //Accessor -> agama
    public function getAgamaAttribute($agama)
    {
        return ucwords($agama);
    }
    //Mutator -> agama -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setAgamaAttribute($agama)
    {
        $this->attributes['agama'] = trim(strtolower($agama));
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
