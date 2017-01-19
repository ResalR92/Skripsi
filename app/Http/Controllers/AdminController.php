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
        $peserta = Peserta::all();
        $jurusan = Jurusan::all();
        $kontak = Kontak::all();

        $jml_peserta = $peserta->count();
        $jml_jurusan = $jurusan->count();
        $jml_kontak = $kontak->count();

        $tb_jurusan = [];
        $tb_peserta = [];

        foreach($jurusan as $jurusan){
            array_push($tb_jurusan, $jurusan->nama);
            array_push($tb_peserta, $jurusan->peserta->count());
        }


		return view('dashboard.admin',compact('jml_peserta','jml_jurusan','jml_kontak','tb_jurusan','tb_peserta'));
    }

    public function myadmin()
    {
    	$id = Auth::user()->id;
    	$admin = Auth::user()->where('id',$id)->get();
    	return view('admin.index',compact('admin'));
    }
}
