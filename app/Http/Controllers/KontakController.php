<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    private $dibalas = 1;

    public function __construct()
    {
        //Membatasi role->operator
        $this->middleware('role:admin',['except'=>[
            'index',
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
            //Menampilkan pengumuman -> terbaru
            $kontak = Kontak::latest();
            return Datatables::of($kontak)
                //Menambah kolom Tanggal -> karena Carbon -> konflik -> datatable
                ->addColumn('tanggal',function($kontak){
                        $tanggal = $kontak->created_at->formatLocalized('%d %B %Y');
                        return $tanggal;
                    })
                //Membuat kolom tambahan status balas -> span -> label -> merah , hijau
                ->addColumn('dibalas',function($kontak){
                        if($kontak->dibalas == false){
                            return '<span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>';
                        }elseif($kontak->dibalas == true){
                            return '<span class="label label-success"><i class="glyphicon glyphicon-ok"></i></span>';
                        }
                    })
                //menambah kolom ACTION -> edit, delete -> datatable._kontak.blade.php
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
            ->addColumn(['data'=>'dibalas','name'=>'dibalas','title'=>'Balas'])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);

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
        // return redirect('/admin/kontak');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama'=>'required|max:30',
        //     'email' => 'required|email|max:30',
        //     'judul' => 'required|max:50',
        //     'isi' =>'required',
        // ]);
        // $kontak = Kontak::create($request->all());

        // Session::flash('flash_message','Data Kontak berhasil dikirim.');
        // return redirect('admin/kontak');
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
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit',compact('kontak'));
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
        $kontak = Kontak::findOrFail($id);

        $input = $request->all();

        $this->validate($request, [
            'nama'=>'required|max:30',
            'email' => 'required|email|max:30',
            'judul' => 'required|max:50',
            'isi' =>'required',
            're_judul' =>'required|max:50',
            'balasan' => 'required'
        ]);
        $balasan = $request->input('balasan');

        //mengirimkan email balasan ke email kontak tujuan
        try{
        $kirim = Mail::send('admin.kontak.email', compact('balasan'), function ($m) use ($kontak){
                    $m->to($kontak->email, $kontak->nama)->subject($kontak->re_judul);
                });
        throw new Exception('error');
        
        }catch(Exception $e){
            Session::flash('flash_error','Balasan Kontak GAGAL dikirim.');
            return redirect('admin/kontak');
        }

        if($kirim === true){
            $input['dibalas'] = $this->balas;
            $kontak->update($input);

            Session::flash('flash_message','Balasan Kontak berhasil dikirim.');
            return redirect('admin/kontak');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        Session::flash('flash_message','Data Kontak berhasil dihapus.');
        Session::flash('penting',true);
        
        return redirect('admin/kontak');
    }
}
