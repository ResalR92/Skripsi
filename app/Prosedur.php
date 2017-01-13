<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosedur extends Model
{
    protected $table = 'prosedur';

    protected $fillable = ['judul','isi'];
}
