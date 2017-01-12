<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PesertaRequest;
use App\Peserta;
use App\User;
use App\Jurusan;
use App\Sekolah;
use App\Ayah;
use App\Ibu;
use App\Wali;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $peserta = Peserta::with(['sekolah','jurusan']);
            return Datatables::of($peserta)
                ->addColumn('verifikasi',function($peserta){
                    return view('datatable._verifikasi',[
                        'model'=>$peserta,
                        'valid_url'=>'',
                        'no_valid_url'=>'',
                        'confirm_message'=>'Apakah Anda yakin '.$peserta->nama.' valid ?'
                    ]);
                })
                ->addColumn('lulus',function($peserta){
                    return view('datatable._lulus',[
                        'model'=>$peserta,
                        'lulus_url'=>'',
                        'no_lulus_url'=>'',
                        'confirm_message'=>'Apakah Anda yakin '.$peserta->nama.' lulus ?'
                    ]);
                })
                ->addColumn('action',function($peserta){
                    return view('datatable._cetak',[
                        'model' => $peserta,
                        'form_url' => route('peserta.destroy',$peserta->id),
                        'edit_url' => route('peserta.edit',$peserta->id),
                        'cetak_url' => '',
                        'confirm_message'=>'Apakah Anda yakin menghapus Jurusan '.$peserta->nama.'?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'id','name'=>'id','title'=>'NISN'])
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Peserta'])
            ->addColumn(['data'=>'jurusan.nama','name'=>'jurusan.nama','title'=>'Program Keahlian'])
            ->addColumn(['data'=>'sekolah.nama','name'=>'sekolah.nama','title'=>'Sekolah Asal'])
            ->addColumn(['data'=>'verifikasi','name'=>'verifikasi','title'=>'Verifikasi'])
            ->addColumn(['data'=>'lulus','name'=>'lulus','title'=>'Lulus'])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('admin.peserta.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesertaRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($request);
        }

        $input['user_id'] = '3';

        $peserta = Peserta::create($input);

        //Simpan data sekolah
        $sekolah = new Sekolah;
        $sekolah->nama = $request->input('nama_sekolah');
        $sekolah->alamat = $request->input('alamat_sekolah');
        $peserta->sekolah()->save($sekolah);

        //Simpan data ayah
        $ayah = new Ayah;
        $ayah->nama = $request->input('nama_ayah');
        $ayah->tempat_lahir = $request->input('tempat_lahir_ayah');
        $ayah->tanggal_lahir = $request->input('tanggal_lahir_ayah');
        $ayah->agama = $request->input('agama_ayah');
        $ayah->pendidikan = $request->input('pendidikan_ayah');
        $ayah->pekerjaan = $request->input('pekerjaan_ayah');
        $ayah->gaji = $request->input('gaji_ayah');
        $ayah->telepon = $request->input('telepon_ayah');
        $ayah->no_hp = $request->input('no_hp_ayah');
        $ayah->alamat = $request->input('alamat_ayah');
        $peserta->ayah()->save($ayah);

        //Simpan data ibu
        $ibu = new Ibu;
        $ibu->nama = $request->input('nama_ibu');
        $ibu->tempat_lahir = $request->input('tempat_lahir_ibu');
        $ibu->tanggal_lahir = $request->input('tanggal_lahir_ibu');
        $ibu->agama = $request->input('agama_ibu');
        $ibu->pendidikan = $request->input('pendidikan_ibu');
        $ibu->pekerjaan = $request->input('pekerjaan_ibu');
        $ibu->gaji = $request->input('gaji_ibu');
        $ibu->telepon = $request->input('telepon_ibu');
        $ibu->no_hp = $request->input('no_hp_ibu');
        $ibu->alamat = $request->input('alamat_ibu');
        $peserta->ibu()->save($ibu);

        //Simpan data wali
        $wali = new Wali;
        $wali->nama = $request->input('nama_wali');
        $wali->tempat_lahir = $request->input('tempat_lahir_wali');
        $wali->tanggal_lahir = $request->input('tanggal_lahir_wali');
        $wali->agama = $request->input('agama_wali');
        $wali->pendidikan = $request->input('pendidikan_wali');
        $wali->pekerjaan = $request->input('pekerjaan_wali');
        $wali->gaji = $request->input('gaji_wali');
        $wali->telepon = $request->input('telepon_wali');
        $wali->no_hp = $request->input('no_hp_wali');
        $wali->alamat = $request->input('alamat_wali');
        $peserta->wali()->save($wali);

        Session::flash('flash_message','Biodata Peserta berhasil disimpan.');

        return redirect('admin/peserta');
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

    private function uploadFoto(PesertaRequest $request)
    {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if($request->file('foto')->isValid()){
            $foto_name = date('YmdHis').".$ext";
            $upload_path = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);
            
            return $foto_name;
        }
        return false;
    }

    private function hapusFoto($id)
    {
        $peserta = Peserta::findOrFail($id);
        $exist = Storage::disk('foto')->exists($peserta->foto);
        if(isset($peserta->foto) && $exist){
            $delete = Storage::disk('foto')->delete($peserta->foto);

            if($delete){
                return true;
            }
            return false;
        }
    }
}
