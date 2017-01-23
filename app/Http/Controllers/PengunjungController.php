<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\User;
use App\Jurusan;
use App\Sekolah;
use App\Pengumuman;
use App\Prosedur;
use App\Jadwal;
use App\Kontak;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Laratrust\LaratrustFacade as Laratrust;
use App\Daftar;

class PengunjungController extends Controller
{
	public function index()
	{
        $daftar = Daftar::all()->where('aktif',1)->toArray();
        if(Laratrust::hasRole('peserta')){
            return redirect('/home');
        }
		return view('dashboard.pengunjung',compact('daftar'));
	}
    public function peserta(Request $request, Builder $htmlBuilder)
    {
    	if($request->ajax()){
            $peserta = Peserta::with(['sekolah','jurusan']);
            return Datatables::of($peserta)
                ->addColumn('status',function($peserta){
                    return view('datatable._status',[
                        'status'=>$peserta->status->nama,
                        'label' =>$peserta->status->label,
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Peserta'])
            ->addColumn(['data'=>'jurusan.nama','name'=>'jurusan.nama','title'=>'Program Keahlian'])
            ->addColumn(['data'=>'sekolah.nama','name'=>'sekolah.nama','title'=>'Sekolah Asal'])
            ->addColumn(['data'=>'status','name'=>'status','title'=>'Status','orderable'=>false,'searchable'=>false]);
        return view('pengunjung.peserta',compact('html'));
    }

    public function pengumuman()
    {
    	$pengumuman_list = Pengumuman::orderBy('updated_at','desc')->paginate(1);
    	return view('pengunjung.pengumuman',compact('pengumuman_list'));
    }

    public function prosedur()
    {
    	$prosedur_list = Prosedur::all()->sortBy('judul');
    	return view('pengunjung.prosedur',compact('prosedur_list'));
    }

    public function jadwal()
    {
    	$jadwal_list = Jadwal::all()->sortBy('awal');
    	return view('pengunjung.jadwal',compact('jadwal_list'));
    }

    public function kontak()
    {
    	return view('pengunjung.kontak');
    }
    public function kirim(Request $request)
    {
    	$this->validate($request, [
            'nama'=>'required|max:30',
            'email' => 'required|email|max:30',
            'judul' => 'required|max:50',
            'isi' =>'required',
        ]);
        $kontak = Kontak::create($request->all());

        Session::flash('flash_message','Data Kontak berhasil dikirim.');
        return redirect('kontak');
    }
}
