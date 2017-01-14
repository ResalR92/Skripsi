<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $kontak = Kontak::orderBy('created_at','desc');
            return Datatables::of($kontak)
                ->addColumn('tanggal',function($kontak){
                        $tanggal = $kontak->created_at->format('d-m-Y');
                        return $tanggal;
                    })
                ->addColumn('dibalas',function($kontak){
                        if($kontak->dibalas == false){
                            return '<a href="" class="btn btn-danger btn-xs" disabled>
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>';
                        }elseif($kontak->dibalas == true){
                            return '<a href="" class="btn btn-success btn-xs" disabled>
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </a>';
                        }
                    })
                ->addColumn('action',function($kontak){
                    return view('datatable._kontak',[
                        'model' => $kontak,
                        'form_url' => route('kontak.destroy',$kontak->id),
                        'edit_url' => route('kontak.edit',$kontak->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Kontak '.$kontak->nama.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
            ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
            ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
            ->addColumn(['data'=>'tanggal','name'=>'tanggal','title'=>'Tanggal','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'dibalas','name'=>'dibalas','title'=>'Respon'])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('admin.kontak.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kontak.create');
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
            'nama'=>'required|max:30',
            'email' => 'required|email|max:30',
            'judul' => 'required|max:50',
            'isi' =>'required',
        ]);
        $kontak = Kontak::create($request->all());

        Session::flash('flash_message','Data Kontak berhasil disimpan.');
        return redirect('admin/kontak');
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
