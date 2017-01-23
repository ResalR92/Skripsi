<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prosedur;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class ProsedurController extends Controller
{
    public function __construct()
    {
        //Membatasi role->operator
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
            $prosedur = Prosedur::orderBy('judul','asc');
            return Datatables::of($prosedur)
                //menambah kolom ACTION -> edit, delete -> datatable._admin.blade.php
                ->addColumn('action',function($prosedur){
                    return view('datatable._admin',[
                        'model' => $prosedur,
                        'form_url' => route('prosedur.destroy',$prosedur->id),
                        'edit_url' => route('prosedur.edit',$prosedur->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus prosedur '.$prosedur->judul.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul Prosedur','orderable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);

        return view('admin.prosedur.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prosedur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //trait->validasi -> judul, isi
        $this->validate($request, [
            'judul'=>'required|max:50|unique:prosedur,judul',
            'isi'=>'required'
        ]);
        //menyimpan data prosedur
        Prosedur::create($request->all());
        //Membuat session -> flash_message
        Session::flash('flash_message','Data Prosedur berhasil disimpan.');
        return redirect('admin/prosedur');
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
        //Menemukan model Prosedur atau dihentikan
        $prosedur = Prosedur::findOrFail($id);
        return view('admin.prosedur.edit',compact('prosedur'));
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
        $prosedur = Prosedur::findOrFail($id);

        $this->validate($request, [
            'judul'=>'required|max:50|unique:prosedur,judul,'.$id,
            'isi'=>'required'
        ]);

        $prosedur->update($request->all());

        Session::flash('flash_message','Data Prosedur berhasil diupdate.');
        return redirect('admin/prosedur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prosedur = Prosedur::findOrFail($id);
        $prosedur->destroy($id);

        Session::flash('flash_message','Data Prosedur berhasil dihapus.');
        Session::flash('penting',true);
        
        return redirect('admin/prosedur');
    }
}
