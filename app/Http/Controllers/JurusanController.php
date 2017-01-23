<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class JurusanController extends Controller
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
            $jurusan = Jurusan::all();
            return Datatables::of($jurusan)
                //Membuat kolom tambahan jumlah KUOTA -> span -> label -> hijau, kuning, merah
                ->addColumn('kuota',function($jurusan){
                    $kuota = $jurusan->kuota;
                    if($kuota > 15){
                        return '<span class="label label-success">'.$kuota.'</span>';
                    }elseif($kuota >= 5 && $kuota <= 15){
                        return '<span class="label label-warning">'.$kuota.'</span>';
                    }elseif($kuota < 5){
                        return '<span class="label label-danger">'.$kuota.'</span>';
                    }
                })
                //menambah kolom ACTION -> edit, delete -> datatable._admin.blade.php
                ->addColumn('action',function($jurusan){
                    return view('datatable._admin',[
                        'model' => $jurusan,
                        'form_url' => route('jurusan.destroy',$jurusan->id),
                        'edit_url' => route('jurusan.edit',$jurusan->id),
                        //pesan alert javascript
                        'confirm_message'=>'Apakah Anda yakin menghapus Jurusan '.$jurusan->nama.'?'
                    ]);
                })->make(true);
        }
        //kolom-kolom yang akan ditampilkan
        $html = $htmlBuilder
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Jurusan','orderable'=>false])
            ->addColumn(['data'=>'kuota','name'=>'kuota','title'=>'Sisa Kuota','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'kapasitas','name'=>'kapasitas','title'=>'Kapasitas','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);

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
        //trait->validasi -> nama,kapasitas
        $this->validate($request, [
            'nama'=>'required|string|max:50|unique:jurusan,nama',
            'kapasitas' => 'required|numeric|digits_between:1,3',
        ]);
        //Menyimpan data jurusan
        Jurusan::create($request->all());
        //Membuat session -> flash_message
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
        //Menemukan model Jurusan atau dihentikan
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

        $this->validate($request, [
            'nama'=>'required|string|max:50|unique:jurusan,nama,'.$id,
            'kapasitas' => 'required|numeric|digits_between:1,3',
        ]);

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
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        Session::flash('flash_message','Data Jurusan berhasil dihapus.');
        Session::flash('penting',true);
        return redirect('admin/jurusan');
    }
}
