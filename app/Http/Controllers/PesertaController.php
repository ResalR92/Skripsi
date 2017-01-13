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
use Storage;
use PDF;

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
                        'cetak_url' => route('peserta.show',$peserta->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Jurusan '.$peserta->nama.'?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'id','name'=>'id','title'=>'No. Pendaftaran'])
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
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.show',compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->nama_sekolah = $peserta->sekolah->nama;
        $peserta->alamat_sekolah = $peserta->sekolah->alamat;

        $peserta->nama_ayah = $peserta->ayah->nama;
        $peserta->tempat_lahir_ayah = $peserta->ayah->tempat_lahir;
        $peserta->tanggal_lahir_ayah = $peserta->ayah->tanggal_lahir;
        $peserta->agama_ayah = $peserta->ayah->agama;
        $peserta->pendidikan_ayah = $peserta->ayah->pendidikan;
        $peserta->pekerjaan_ayah = $peserta->ayah->pekerjaan;
        $peserta->gaji_ayah = $peserta->ayah->gaji;
        $peserta->telepon_ayah = $peserta->ayah->telepon;
        $peserta->no_hp_ayah = $peserta->ayah->no_hp;
        $peserta->alamat_ayah = $peserta->ayah->alamat;

        $peserta->nama_ibu = $peserta->ibu->nama;
        $peserta->tempat_lahir_ibu = $peserta->ibu->tempat_lahir;
        $peserta->tanggal_lahir_ibu = $peserta->ibu->tanggal_lahir;
        $peserta->agama_ibu = $peserta->ibu->agama;
        $peserta->pendidikan_ibu = $peserta->ibu->pendidikan;
        $peserta->pekerjaan_ibu = $peserta->ibu->pekerjaan;
        $peserta->gaji_ibu = $peserta->ibu->gaji;
        $peserta->telepon_ibu = $peserta->ibu->telepon;
        $peserta->no_hp_ibu = $peserta->ibu->no_hp;
        $peserta->alamat_ibu = $peserta->ibu->alamat;

        $peserta->nama_wali = $peserta->wali->nama;
        $peserta->tempat_lahir_wali = $peserta->wali->tempat_lahir;
        $peserta->tanggal_lahir_wali = $peserta->wali->tanggal_lahir;
        $peserta->agama_wali = $peserta->wali->agama;
        $peserta->pendidikan_wali = $peserta->wali->pendidikan;
        $peserta->pekerjaan_wali = $peserta->wali->pekerjaan;
        $peserta->gaji_wali = $peserta->wali->gaji;
        $peserta->telepon_wali = $peserta->wali->telepon;
        $peserta->no_hp_wali = $peserta->wali->no_hp;
        $peserta->alamat_wali = $peserta->wali->alamat;

        // var_dump($peserta);
        // exit();
        return view('admin.peserta.edit',compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PesertaRequest $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $input = $request->all();

        // return var_dump($input);

        if($request->hasFile('foto')){
            //Hapus foto lama jika ada foto baru
            $this->hapusFoto($peserta);
            //Upload foto baru
            $input['foto'] = $this->uploadFoto($request);
        }
        //Update data peserta
        $peserta->update($input);
        
        //Update data sekolah
        $sekolah = $peserta->sekolah;
        $sekolah->nama = $request->input('nama_sekolah');
        $sekolah->alamat = $request->input('alamat_sekolah');
        $peserta->sekolah()->save($sekolah);

        //Update data ayah
        $ayah = $peserta->ayah;
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

        //Update data ibu
        $ibu = $peserta->ibu;
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

        //Update data wali
        $wali = $peserta->wali;
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

        Session::flash('flash_message','Biodata Peserta berhasil diupdate.');

        return redirect('admin/peserta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $this->hapusFoto($peserta);
        $peserta->delete();

        Session::flash('flash_message','Biodata berhasil dihapus');
        Session::flash('penting',true);

        return redirect('admin/peserta');
    }

    public function pdf($id)
    {
        $peserta = Peserta::findOrFail($id);
        $pdf = PDF::loadview('pdf.biodata',compact('peserta'));
        return $pdf->download('biodata_'.$peserta->nama.'-'.date('YmdHis').'.pdf');
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

    private function hapusFoto(Peserta $peserta)
    {
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
