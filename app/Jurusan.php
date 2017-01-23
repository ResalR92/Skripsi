<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Jurusan extends Model
{
    //table jurusan
    protected $table = 'jurusan';
    //mass assignment
    protected $fillable = ['nama','kapasitas'];

    //relasi one to many -> Jurusan memiliki banyak Peserta
    public function peserta()
    {
    	return $this->hasMany('App\Peserta','id_jurusan');
    }

    //Model Event
    public static function boot()
    {
    	parent::boot();
        //deleting -> jika masih ada Peserta maka Jurusan tidak dapat dihapus
    	self::deleting(function($jurusan){
    		//mengecek apakah peserta masih ada di jurusan ini
    		if($jurusan->peserta->count() > 0){
    			//menyiapkan pesan error
    			Session::flash('flash_error','Jurusan tidak dapat dihapus karena masih memiliki Peserta');
    			Session::flash('penting',true);

    			return false;
    		}
    	});
        //updating -> jika jumlah kapasitas lebih kecil dari jumlah peserta, maka tidak dapat diupdate
        self::updating(function($jurusan){
            if($jurusan->kuota < $jurusan->peserta->count()){
                Session::flash('flash_error','Jurusan harus memiliki kapasitas >= '.$jurusan->peserta->count().' Peserta');
                Session::flash('penting',true);

                return false;
            }
        });
    }
    //Mendapatkan atribut kuota
    public function getKuotaAttribute()
    {
        $peserta = $this->peserta()->count();
        $kuota = $this->kapasitas - $peserta;

        return $kuota;
    }
    //Accessor -> nama jurusan
    public function getNamaAttribute($nama)
    {
        return ucwords($nama);
    }
    //Mutator -> nama jurusan -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = trim(strtolower($nama));
    }
}
