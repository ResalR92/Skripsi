<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\User;
use App\Jurusan;
use App\Sekolah;
use App\Ayah;
use App\Ibu;
use App\Wali;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $peserta = Peserta::with(['sekolah','jurusan']);
            return Datatables::of($peserta)
                ->addColumn('verifikasi',function($peserta){
                    return view('datatable._verifikasi',[
                        'model'=>$peserta,
                        'valid_url'=>'',
                        'no_valid_url'=>'',
                        'confirm_message'=>'Apakah Anda yakin '.$peserta->nama.' valid ?'
                    ]);
                })
                ->addColumn('lulus',function($peserta){
                    return view('datatable._lulus',[
                        'model'=>$peserta,
                        'lulus_url'=>'',
                        'no_lulus_url'=>'',
                        'confirm_message'=>'Apakah Anda yakin '.$peserta->nama.' lulus ?'
                    ]);
                })
                ->addColumn('action',function($peserta){
                    return view('datatable._cetak',[
                        'model' => $peserta,
                        'form_url' => route('peserta.destroy',$peserta->id),
                        'edit_url' => route('peserta.edit',$peserta->id),
                        'cetak_url' => '',
                        'confirm_message'=>'Apakah Anda yakin menghapus Jurusan '.$peserta->nama.'?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'id','name'=>'id','title'=>'NISN'])
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Peserta'])
            ->addColumn(['data'=>'jurusan.nama','name'=>'jurusan.nama','title'=>'Program Keahlian'])
            ->addColumn(['data'=>'sekolah.nama','name'=>'sekolah.nama','title'=>'Sekolah Asal'])
            ->addColumn(['data'=>'verifikasi','name'=>'verifikasi','title'=>'Verifikasi'])
            ->addColumn(['data'=>'lulus','name'=>'lulus','title'=>'Lulus'])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('admin.peserta.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
