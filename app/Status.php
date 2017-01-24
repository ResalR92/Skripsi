<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Status extends Model
{
    //table status
    protected $table = 'status';
    //mass assignment
    protected $fillable = ['nama','label','pesan'];

    //relasi one to many -> Status memiliki banyak Peserta
    public function peserta()
    {
    	return $this->hasMany('App\Peserta','id_status');
    }

    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($status){
    		//mengecek apakah peserta masih ada di status ini atau status yang sudah dibakukan
    		if(($status->peserta->count() > 0) || ($status->id < 7)){
    			//menyiapkan pesan error
    			Session::flash('flash_error','Status tidak dapat dihapus karena masih berlaku');
    			Session::flash('penting',true);

    			return false;
    		}
    	});
        self::updating(function($status){
            //mengecek apakah peserta masih ada di status ini atau status yang sudah dibakukan
            if(($status->peserta->count() > 0) || ($status->id < 7)){
                //menyiapkan pesan error
                Session::flash('flash_error','Status tidak dapat diupdate karena masih berlaku');
                Session::flash('penting',true);

                return false;
            }
        });
    }
    //Accessor -> nama status
    public function getNamaAttribute($nama)
    {
        return ucwords($nama);
    }
    //Mutator -> nama status -> ke huruf kecil ->trim -> untuk mengantisipasi spasi berlebihan
    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = trim(strtolower($nama));
    }
}
