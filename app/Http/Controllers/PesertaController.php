<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PesertaRequest;
use App\Peserta;
use App\User;
use App\Jurusan;
use App\Sekolah;
use App\Ayah;
use App\Ibu;
use App\Wali;
use App\Status;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Storage;
use PDF;

class PesertaController extends Controller
{
    private $status_baru = 1;

    public function __construct()
    {
        //Membatasi role->operator
        $this->middleware('role:admin',['except'=>[
            'index',
            'show',
            'pdf',
            'status',
            'updateStatus',
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
            $peserta = Peserta::with(['sekolah','jurusan']);
            return Datatables::of($peserta)
                //membuat KOLOM tambahan->STATUS
                ->addColumn('status',function($peserta){
                    return view('datatable._status',[
                        'status'=>$peserta->status->nama,
                        'label' =>$peserta->status->label,
                    ]);
                })
                //menambah kolom ACTION -> verifikasi, edit, delete -> datatable._cetak.blade.php
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
            ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Peserta'])
            ->addColumn(['data'=>'jurusan.nama','name'=>'jurusan.nama','title'=>'Program Keahlian'])
            ->addColumn(['data'=>'sekolah.nama','name'=>'sekolah.nama','title'=>'Sekolah Asal'])
            ->addColumn(['data'=>'status','name'=>'status','title'=>'Status','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('admin.peserta.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.peserta.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //menggunakan FORM REQUEST -> untuk validasi
    // public function store(PesertaRequest $request)
    // {
    //     $input = $request->all();
    //     //mengecek apakah ada file FOTO
    //     if($request->hasFile('foto')){
    //         //memanggil method -> uploadFoto()
    //         $input['foto'] = $this->uploadFoto($request);
    //     }
    //     //menentukan user ID -> untuk setiap Biodata Peserta (relasi one to one)
    //     $input['user_id'] = Auth::user()->id;
    //     //menentukan STATUS awal (default) -> BARU
    //     $input['id_status'] = $this->status_baru;
    //     //meyimpan data peserta
    //     $peserta = Peserta::create($input);

    //     //Simpan data sekolah
    //     $sekolah = new Sekolah;
    //     $sekolah->nama = $request->input('nama_sekolah');
    //     $sekolah->alamat = $request->input('alamat_sekolah');
    //     $peserta->sekolah()->save($sekolah);

    //     //Simpan data ayah
    //     $ayah = new Ayah;
    //     $ayah->nama = $request->input('nama_ayah');
    //     $ayah->tempat_lahir = $request->input('tempat_lahir_ayah');
    //     $ayah->tanggal_lahir = $request->input('tanggal_lahir_ayah');
    //     $ayah->agama = $request->input('agama_ayah');
    //     $ayah->pendidikan = $request->input('pendidikan_ayah');
    //     $ayah->pekerjaan = $request->input('pekerjaan_ayah');
    //     $ayah->gaji = $request->input('gaji_ayah');
    //     $ayah->telepon = $request->input('telepon_ayah');
    //     $ayah->no_hp = $request->input('no_hp_ayah');
    //     $ayah->alamat = $request->input('alamat_ayah');
    //     $peserta->ayah()->save($ayah);

    //     //Simpan data ibu
    //     $ibu = new Ibu;
    //     $ibu->nama = $request->input('nama_ibu');
    //     $ibu->tempat_lahir = $request->input('tempat_lahir_ibu');
    //     $ibu->tanggal_lahir = $request->input('tanggal_lahir_ibu');
    //     $ibu->agama = $request->input('agama_ibu');
    //     $ibu->pendidikan = $request->input('pendidikan_ibu');
    //     $ibu->pekerjaan = $request->input('pekerjaan_ibu');
    //     $ibu->gaji = $request->input('gaji_ibu');
    //     $ibu->telepon = $request->input('telepon_ibu');
    //     $ibu->no_hp = $request->input('no_hp_ibu');
    //     $ibu->alamat = $request->input('alamat_ibu');
    //     $peserta->ibu()->save($ibu);

    //     //Simpan data wali
    //     $wali = new Wali;
    //     $wali->nama = $request->input('nama_wali');
    //     $wali->tempat_lahir = $request->input('tempat_lahir_wali');
    //     $wali->tanggal_lahir = $request->input('tanggal_lahir_wali');
    //     $wali->agama = $request->input('agama_wali');
    //     $wali->pendidikan = $request->input('pendidikan_wali');
    //     $wali->pekerjaan = $request->input('pekerjaan_wali');
    //     $wali->gaji = $request->input('gaji_wali');
    //     $wali->telepon = $request->input('telepon_wali');
    //     $wali->no_hp = $request->input('no_hp_wali');
    //     $wali->alamat = $request->input('alamat_wali');
    //     $peserta->wali()->save($wali);

    //     Session::flash('flash_message','Biodata Peserta berhasil disimpan.');

    //     return redirect('admin/peserta');
    // }

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
        //mengambil data peserta->sekolah
        $peserta->nama_sekolah = $peserta->sekolah->nama;
        $peserta->alamat_sekolah = $peserta->sekolah->alamat;
        //mengambil data peserta->ayah
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
        //mengambil data peserta->ibu
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
        //mengambil data peserta->wali
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

        return view('admin.peserta.edit',compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //menggunakan FORM REQUEST -> untuk validasi
    public function update(PesertaRequest $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $input = $request->all();
        //mengecek ada file FOTO
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
        //memanggil method -> hapusFoto()
        $this->hapusFoto($peserta);
        $peserta->delete();

        Session::flash('flash_message','Biodata berhasil dihapus');
        Session::flash('penting',true);

        return redirect('admin/peserta');
    }

    public function status($id)
    {
        $peserta = Peserta::findOrFail($id);
        //mengambil atribute status->id
        $peserta->id_status = $peserta->status->id;
        return view('admin.peserta.status',compact('peserta'));
    }
    //mengupdate STATUS -> verifikasi Peserta
    public function updateStatus(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $this->validate($request,['id_status' => 'required']);
        //Update data peserta
        $peserta->update($request->all());

        Session::flash('flash_message','Status Peserta berhasil diupdate.');
        return redirect('admin/peserta');
    }
    //mendownload PDF -> Biodata Peserta
    public function pdf($id)
    {
        $peserta = Peserta::findOrFail($id);
        $jurusan = Jurusan::all();
        //memanggil file DOM untuk dicetak
        $pdf = PDF::loadview('pdf.biodata',compact('peserta','jurusan'));
        //memformat kertas->legal,portrait dan download file PDF
        return $pdf->setPaper('legal', 'portrait')->download('biodata_'.$peserta->nama.'-'.date('YmdHis').'.pdf');
    }

    private function uploadFoto(PesertaRequest $request)
    {
        //memastikan ada request FILE -> FOTO
        $foto = $request->file('foto');
        //mengambil extensi, untuk menyesuaikan dengan validasi STORE/UPDATE
        $ext  = $foto->getClientOriginalExtension();
        //memastikan file -> foto -> VALID
        if($request->file('foto')->isValid()){
            //mengatur NAMA FOTO
            $foto_name = date('YmdHis').".$ext";
            //folder tempat upload
            $upload_path = 'fotoupload';
            //melakukan upload File Foto
            $request->file('foto')->move($upload_path, $foto_name);
            //mengembalikan Nama foto untuk keperluan penyimpanan di DB
            return $foto_name;
        }
        return false;
    }

    private function hapusFoto(Peserta $peserta)
    {
        //mengecek file foto ADA di config/filesystem
        $exist = Storage::disk('foto')->exists($peserta->foto);
        //mengecek file foto di DB dan filesystem
        if(isset($peserta->foto) && $exist){
            //jika ada HAPUS file FOTO
            $delete = Storage::disk('foto')->delete($peserta->foto);
            //mengembalikan nilai TRUE, jika proses hapus berhasil
            if($delete){
                return true;
            }
            return false;
        }
    }
}
