<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
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
    //membatasi role->operator
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

        //mendefinisikan aktif->daftar->DIBUKA
        $aktif = $daftar->where('aktif',1)->toArray();

        //jumlah peserta,jurusan,kontak untuk dashboard->statistik
        $jml_peserta = $peserta_list->count();
        $jml_jurusan = $jurusan_list->count();
        $jml_kontak = $kontak_list->count();

        //array->data->jurusan dan peserta ->Chart.js
        $tb_jurusan = [];
        $tb_peserta = [];

        //mengambil data->jurusan dan peserta -> Chart.js
        foreach($jurusan_list as $jurusan){
            array_push($tb_jurusan, $jurusan->nama);
            array_push($tb_peserta, $jurusan->peserta->count());
        }
		return view('dashboard.admin',compact('jml_peserta','jml_jurusan','jml_kontak','tb_jurusan','tb_peserta','jurusan_list','daftar','aktif'));
    }

    public function myadmin()
    {
        //mengambil user->id
    	$id = Auth::user()->id;
        //menampilkan user sesuai dengan id yang aktif
    	$admin = Auth::user()->where('id',$id)->get();
    	return view('admin.index',compact('admin'));
    }
    //menampilkan form ubah daftar->dibuka/ditutup (admin)
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
        //mengupdate nilai daftar -> DIBUKA/DITUTUP
        $daftar->update($request->all());
        //flash message untuk daftar->hijau/merah
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
