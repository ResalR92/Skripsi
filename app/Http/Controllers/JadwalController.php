<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin',['except'=>[
            'index',
            'create',
            'store',
            'edit',
            'update'
        ]]);
    }
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
                    $awal = $jadwal->awal->formatLocalized('%d %B %Y');
                    return $awal;
                })
                ->addColumn('akhir',function($jadwal){
                    $akhir = $jadwal->akhir->formatLocalized('%d %B %Y');
                    return $akhir;
                })
                ->addColumn('action',function($jadwal){
                    return view('datatable._admin',[
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
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);

        return view('admin.jadwal.index',compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kegiatan'=>'required|max:50|unique:jadwal,kegiatan',
            'awal'=>'required|date',
            'akhir'=>'required|date'
        ]);
        $jadwal = Jadwal::create($request->all());
        Session::flash('flash_message','Data Jadwal berhasil disimpan.');
        return redirect('admin/jadwal');
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
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit',compact('jadwal'));
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
        $jadwal = Jadwal::findOrFail($id);
        $this->validate($request, [
            'kegiatan'=>'required|max:50|unique:jadwal,kegiatan,'.$id,
            'awal'=>'required|date',
            'akhir'=>'required|date'
        ]);
        $jadwal->update($request->all());
        Session::flash('flash_message','Data Jadwal berhasil diupdate.');
        return redirect('admin/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);
        Session::flash('flash_message','Data Jadwal berhasil dihapus.');
        Session::flash('penting',true);
        return redirect('admin/jadwal');
    }
}
