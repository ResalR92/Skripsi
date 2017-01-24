<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
	//table daftar
    protected $table = 'daftar';
    //mass assignment
    protected $fillable = ['aktif'];
}
