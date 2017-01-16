<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\User;
use App\Jurusan;
use App\Sekolah;
use App\Pengumuman;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class PengunjungController extends Controller
{
	public function index()
	{
		return view('dashboard.pengunjung');
	}
    public function peserta(Request $request, Builder $htmlBuilder)
    {
    	if($request->ajax()){
            $peserta = Peserta::with(['sekolah','jurusan']);
            return Datatables::of($peserta)
                ->addColumn('verifikasi',function($peserta){
                    return view('datatable._verifikasi',[
                        'verifikasi'=>$peserta->verifikasi,
                        'valid_url'=>'',
                        'no_valid_url'=>'',
                        'confirm_message'=>'Apakah Anda yakin '.$peserta->nama.' valid ?'
                    ]);
                })
                ->addColumn('lulus',function($peserta){
                    return view('datatable._lulus',[
                        'lulus'=>$peserta->lulus,
                        'lulus_url'=>'',
                        'no_lulus_url'=>'',
                        'confirm_message'=>'Apakah Anda yakin '.$peserta->nama.' lulus ?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Peserta'])
            ->addColumn(['data'=>'jurusan.nama','name'=>'jurusan.nama','title'=>'Program Keahlian'])
            ->addColumn(['data'=>'sekolah.nama','name'=>'sekolah.nama','title'=>'Sekolah Asal'])
            ->addColumn(['data'=>'verifikasi','name'=>'verifikasi','title'=>'Verifikasi','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'lulus','name'=>'lulus','title'=>'Lulus','orderable'=>false,'searchable'=>false]);
        return view('pengunjung.peserta',compact('html'));
    }

    public function pengumuman()
    {
    	$pengumuman_list = Pengumuman::orderBy('updated_at','desc')->paginate(1);
    	// return $pengumuman_list;
    	return view('pengunjung.pengumuman',compact('pengumuman_list'));
    }
}
