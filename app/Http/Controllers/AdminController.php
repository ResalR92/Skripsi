<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Peserta;
use App\Jurusan;
use App\Kontak;
use App\Daftar;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin',['except'=>[
            'index',
            'myadmin',
        ]]);
    }
    public function index()
    {
        $peserta_list = Peserta::all();
        $jurusan_list = Jurusan::all();
        $kontak_list = Kontak::all();
        $daftar = Daftar::all();
        $aktif = $daftar->where('aktif',1)->toArray();

        $jml_peserta = $peserta_list->count();
        $jml_jurusan = $jurusan_list->count();
        $jml_kontak = $kontak_list->count();

        $tb_jurusan = [];
        $tb_peserta = [];

        foreach($jurusan_list as $jurusan){
            array_push($tb_jurusan, $jurusan->nama);
            array_push($tb_peserta, $jurusan->peserta->count());
        }
		return view('dashboard.admin',compact('jml_peserta','jml_jurusan','jml_kontak','tb_jurusan','tb_peserta','jurusan_list','daftar','aktif'));
    }

    public function myadmin()
    {
    	$id = Auth::user()->id;
    	$admin = Auth::user()->where('id',$id)->get();
    	return view('admin.index',compact('admin'));
    }

    public function editDaftar($id)
    {
        $daftar = Daftar::findOrFail($id);
        return view('admin.daftar.edit',compact('daftar'));
    }

    public function updateDaftar($id, Request $request)
    {
        $daftar = Daftar::findOrFail($id);
        $this->validate($request, [
            'aktif' => 'required',
        ]);

        $daftar->update($request->all());
        if($daftar->aktif){
            Session::flash('flash_message','Pendaftaran telah dibuka.');
            Session::flash('penting',true);
        }else{
            Session::flash('flash_error','Pendaftaran telah ditutup.');
            Session::flash('penting',true);
        }
        return redirect('admin');
    }
}
