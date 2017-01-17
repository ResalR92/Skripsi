<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $jurusan = Jurusan::select(['id','nama','kapasitas']);
            return Datatables::of($jurusan)
                ->addColumn('action',function($jurusan){
                    return view('datatable._action',[
                        'model' => $jurusan,
                        'form_url' => route('jurusan.destroy',$jurusan->id),
                        'edit_url' => route('jurusan.edit',$jurusan->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Jurusan '.$jurusan->nama.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Jurusan'])
            ->addColumn(['data'=>'kapasitas','name'=>'kapasitas','title'=>'Kapasitas'])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('admin.jurusan.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama'=>'required|max:50|unique:jurusan']);
        $jurusan = Jurusan::create($request->all());

        Session::flash('flash_message','Data Jurusan berhasil disimpan.');
        return redirect('admin/jurusan');
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
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit',compact('jurusan'));
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
        $jurusan = Jurusan::findOrFail($id);

        $this->validate($request, ['nama'=>'required|max:50|unique:jurusan,nama,'.$id]);

        $jurusan->update($request->all());

        Session::flash('flash_message','Data Jurusan berhasil diupdate.');
        return redirect('admin/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::destroy($id);
        Session::flash('flash_message','Data Jurusan berhasil dihapus.');
        Session::flash('penting',true);
        return redirect('admin/jurusan');
    }
}
