<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prosedur;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class ProsedurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $prosedur = Prosedur::orderBy('judul','asc');
            return Datatables::of($prosedur)
                ->addColumn('action',function($prosedur){
                    return view('datatable._action',[
                        'model' => $prosedur,
                        'form_url' => route('prosedur.destroy',$prosedur->id),
                        'edit_url' => route('prosedur.edit',$prosedur->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus prosedur '.$prosedur->judul.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul Prosedur','orderable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('admin.prosedur.index',compact('html'));
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
