<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $pengumuman = Pengumuman::orderBy('updated_at','desc');
            return Datatables::of($pengumuman)
                ->addColumn('tanggal',function($pengumuman){
                    $tanggal = $pengumuman->updated_at->format('d-m-Y');
                    return $tanggal;
                })
                ->addColumn('action',function($pengumuman){
                    return view('datatable._action',[
                        'model' => $pengumuman,
                        'form_url' => route('pengumuman.destroy',$pengumuman->id),
                        'edit_url' => route('pengumuman.edit',$pengumuman->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus pengumuman '.$pengumuman->judul.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul Pengumuman','orderable'=>false])
            ->addColumn(['data'=>'tanggal','name'=>'tanggal','title'=>'Tanggal','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('admin.pengumuman.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
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
