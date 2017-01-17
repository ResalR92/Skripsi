<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = ['nama','label','pesan'];

    public function peserta()
    {
    	return $this->hasMany('App\Peserta','id_status');
    }

    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($status){
    		//mengecek apakah peserta masih ada di jurusan ini
    		if($status->peserta->count() > 0){
    			//menyiapkan pesan error
    			Session::flash('flash_error','Status tidak dapat dihapus karena masih berlaku');
    			Session::flash('penting',true);

    			return false;
    		}
    	});
    }
}
