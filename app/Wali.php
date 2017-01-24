<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Wali extends Model
{
    //table wali
    protected $table = 'wali';
    //menentukan primary key -> karena tidak memiliki ID
    protected $primaryKey = 'id_peserta';
    //mass assignment
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
    //carbon
    protected $dates = ['tanggal_lahir'];
    //relasi one to one -> Peserta memiliki 1 Wali (optional)
    public function peserta()
    {
    	$this->belongsTo('App\Siswa','id_peserta');
    }
    //Mutator->tanggal lahir -> jika tidak diisi (optional)
    public function setTanggalLahirAttribute($value)
    {
        if (strlen($value)) {
                $this->attributes['tanggal_lahir'] = $value;
        } else {
            $this->attributes['tanggal_lahir'] = null;
        }
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
    //Accessor -> pendidikan
    public function getPendidikanAttribute($pendidikan)
    {
        return strtoupper($pendidikan);
    }
    //Mutator -> pendidikan -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setPendidikanAttribute($pendidikan)
    {
        $this->attributes['pendidikan'] = trim(strtolower($pendidikan));
    }
    //Accessor -> pekerjaan
    public function getPekerjaanAttribute($pekerjaan)
    {
        return ucwords($pekerjaan);
    }
    //Mutator -> pekerjaan -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setPekerjaanAttribute($pekerjaan)
    {
        $this->attributes['pekerjaan'] = trim(strtolower($pekerjaan));
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
