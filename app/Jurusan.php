<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['nama','kapasitas'];

    public function peserta()
    {
    	return $this->hasMany('App\Peserta','id_jurusan');
    }

    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($jurusan){
    		//mengecek apakah peserta masih ada di jurusan ini
    		if($jurusan->peserta->count() > 0){
    			//menyiapkan pesan error
    			Session::flash('flash_error','Jurusan tidak dapat dihapus karena masih memiliki Peserta');
    			Session::flash('penting',true);

    			return false;
    		}
    	});
    }

    public function getKuotaAttribute()
    {
        $peserta = $this->peserta()->count();
        $kuota = $this->kapasitas - $peserta;

        return $kuota;
    }
}
