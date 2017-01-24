<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $status = Status::orderBy('id');
            return Datatables::of($status)
                ->addColumn('status',function($status){
                    return view('datatable._status',[
                        'status'=>$status->nama,
                        'label' =>$status->label,
                    ]);
                })
                //menambah kolom ACTION -> edit, delete -> datatable._admin.blade.php
                ->addColumn('action',function($status){
                    return view('datatable._admin',[
                        'model' => $status,
                        'form_url' => route('status.destroy',$status->id),
                        'edit_url' => route('status.edit',$status->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Status '.$status->nama.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'status','name'=>'status','title' => 'Status','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'pesan','name'=>'pesan','title'=>'Pesan','orderable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);

        return view('admin.status.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.create');
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
            'nama'=>'required|string|max:20|unique:status,nama',
            'label' => 'required',
            'pesan' => 'required|string|max:100',
        ]);
        //menyimpan data status
        Status::create($request->all());

        Session::flash('flash_message','Data Status berhasil disimpan.');
        return redirect('admin/status');
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
        $status = Status::findOrFail($id);
        return view('admin.status.edit',compact('status'));
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
        $status = Status::findOrFail($id);
        
        $this->validate($request, [
            'nama'=>'required|string|max:20|unique:status,nama,'.$id,
            'label' => 'required',
            'pesan' => 'required|string|max:100',
        ]);
        //mengupdate data status
        $status->update($request->all());

        Session::flash('flash_message','Data Status berhasil diupdate.');
        return redirect('admin/status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        Session::flash('flash_message','Data Status berhasil dihapus.');
        Session::flash('penting',true);
        
        return redirect('admin/status');
    }
}
