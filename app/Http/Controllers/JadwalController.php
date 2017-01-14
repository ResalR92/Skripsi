<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $jadwal = Jadwal::orderBy('awal','asc');
            return Datatables::of($jadwal)
                ->addColumn('awal',function($jadwal){
                    $awal = $jadwal->awal->format('d-m-Y');
                    return $awal;
                })
                ->addColumn('akhir',function($jadwal){
                    $akhir = $jadwal->akhir->format('d-m-Y');
                    return $akhir;
                })
                ->addColumn('action',function($jadwal){
                    return view('datatable._action',[
                        'model' => $jadwal,
                        'form_url' => route('jadwal.destroy',$jadwal->id),
                        'edit_url' => route('jadwal.edit',$jadwal->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Jadwal '.$jadwal->kegiatan.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'kegiatan','name'=>'kegiatan','title'=>'Kegiatan','orderable'=>false])
            ->addColumn(['data'=>'awal','name'=>'awal','title'=>'Mulai Berlaku','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'akhir','name'=>'akhir','title'=>'Berakhir','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('admin.jadwal.index',compact('html'));

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
