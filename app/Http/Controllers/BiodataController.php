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
use Session;
use Storage;
use PDF;
use App\Daftar;

class BiodataController extends Controller
{
    private $status_baru = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //memastikan User->Peserta Hanya dapat melihat Biodatanya sendiri
        //menggunakan relasi User->Peserta
        $peserta = $request->user()->peserta()->get();
        //mengambil data status -> Array
        $status = $peserta->toArray();
        //mengambil data status Pendaftaran -> Array
        $daftar = Daftar::all()->where('aktif',1)->toArray();
        //mengecek apakah TIDAK ADA status dan status pendaftaran
        if(empty($status) && empty($daftar)){
            //memaksa logout
            Auth::logout();

            Session::flash('flash_error','Maaf, Pendaftaran sudah DITUTUP.');
            Session::flash('penting',true);
            return redirect('/');
        }
        return view('biodata.index',compact('peserta','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //memastikan User->Peserta Hanya dapat melihat Biodatanya sendiri
        //menggunakan relasi User->Peserta
        $peserta = $request->user()->peserta()->get();
        //mengambil data status -> Array
        $status = $peserta->toArray();
        //mengecek apakah TIDAK ADA status dan status pendaftaran
        $daftar = Daftar::all()->where('aktif',1)->toArray();
        //mengecek apakah TIDAK ADA status dan status pendaftaran
        if(empty($daftar) && empty($status)){
            //memaksa logout
            Auth::logout();
            Session::flash('flash_error','Maaf, Pendaftaran sudah DITUTUP.');
            Session::flash('penting',true);
            return redirect('/');
        }
        //mengecek apakah User->peserta sudah memiliki Biodata
        if(!empty($status)){
            //meredirect jika sudah memiliki Biodata
            Session::flash('flash_error','Maaf, Anda sudah memiliki Biodata');
            Session::flash('penting',true);
            return redirect('biodata');
        }
        return view('biodata.create');
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
        //mengecek apakah ada file FOTO
        if($request->hasFile('foto')){
            //memanggil method -> uploadFoto()
            $input['foto'] = $this->uploadFoto($request);
        }
        //menentukan user ID -> untuk setiap Biodata Peserta (relasi one to one)
        $input['user_id'] = Auth::user()->id;
        //menentukan STATUS awal (default) -> BARU
        $input['id_status'] = $this->status_baru;
        //meyimpan data peserta
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

        return redirect('biodata');
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
        //menggunakan PesertaPolicy -> modify() -> mengikat Model User dan Peserta
        //user->id === $peserta->user_id
        $this->authorize('modify',$peserta);

        //Peserta yang sudah dinyatakan status->VALID dapat melihat detail Biodatanya -> cetak
        $label = $peserta->status->label;
        if($label == 'primary'){
            return view('biodata.show',compact('peserta'));
        }else{
            //jika tidak, maka langsung diredirect
            Session::flash('flash_error','Maaf, Mohon hubungi panitia jika ada masalah');
            Session::flash('penting',true);
            return redirect('biodata');
        }
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
        //menggunakan PesertaPolicy -> modify() -> mengikat Model User dan Peserta
        //user->id === $peserta->user_id
        $this->authorize('modify',$peserta);

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

        //Peserta yang berada pada STATUS->Edit, dapat mengedit Biodatanya
        $label = $peserta->status->label;
        if($label == 'warning'){
            return view('biodata.edit',compact('peserta'));
        }else{
            //jika tidak, maka langsung diredirect
            Session::flash('flash_error','Maaf, Mohon hubungi panitia jika ada masalah');
            Session::flash('penting',true);
            return redirect('biodata');
        }
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

        return redirect('biodata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

    public function pdf($id)
    {
        $peserta = Peserta::findOrFail($id);
        $jurusan = Jurusan::all();
        //menggunakan PesertaPolicy -> modify() -> mengikat Model User dan Peserta
        //user->id === $peserta->user_id
        $this->authorize('modify',$peserta);
        //memanggil file DOM untuk dicetak
        $pdf = PDF::loadview('pdf.biodata',compact('peserta','jurusan'));
        //Peserta yang sudah dinyatakan status->VALID dapat download/mencetak
        $label = $peserta->status->label;
        if($label == 'primary'){
            //memformat kertas->legal,portrait dan download file PDF
            return $pdf->setPaper('legal', 'portrait')->download('biodata_'.$peserta->nama.'-'.date('YmdHis').'.pdf');
        }else{
            //jika tidak, maka langsung diredirect
            Session::flash('flash_error','Maaf, Mohon hubungi panitia jika ada masalah');
            Session::flash('penting',true);
            return redirect('biodata');
        }   
    }

    private function uploadFoto(PesertaRequest $request)
    {
        //memastikan ada request FILE -> FOTO
        $foto = $request->file('foto');
        //mengambil extensi, untuk menyesuaikan dengan validasi STORE/UPDATE
        $ext  = $foto->getClientOriginalExtension();
        //memastikan file -> foto -> VALID
        if($request->file('foto')->isValid()){
            $foto_name = date('YmdHis').".$ext";
            $upload_path = 'fotoupload';
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
