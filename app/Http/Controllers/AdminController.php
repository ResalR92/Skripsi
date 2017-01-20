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
        $peserta_list = Peserta::all();
        $jurusan_list = Jurusan::all();
        $kontak_list = Kontak::all();

        $jml_peserta = $peserta_list->count();
        $jml_jurusan = $jurusan_list->count();
        $jml_kontak = $kontak_list->count();

        $tb_jurusan = [];
        $tb_peserta = [];

        foreach($jurusan_list as $jurusan){
            array_push($tb_jurusan, $jurusan->nama);
            array_push($tb_peserta, $jurusan->peserta->count());
        }
		return view('dashboard.admin',compact('jml_peserta','jml_jurusan','jml_kontak','tb_jurusan','tb_peserta','jurusan_list'));
    }

    public function myadmin()
    {
    	$id = Auth::user()->id;
    	$admin = Auth::user()->where('id',$id)->get();
    	return view('admin.index',compact('admin'));
    }
}
