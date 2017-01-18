<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Peserta;
use App\Jurusan;
use App\Kontak;

class AdminController extends Controller
{
    public function index()
    {
        $peserta = Peserta::all()->count();
        $jurusan = Jurusan::all()->count();
        $kontak = Kontak::all()->count();
		return view('dashboard.admin',compact('peserta','jurusan','kontak'));
    }

    public function myadmin()
    {
    	$id = Auth::user()->id;
    	$admin = Auth::user()->where('id',$id)->get();
    	return view('admin.index',compact('admin'));
    }
}
