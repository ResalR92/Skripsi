<?php

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

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $peserta = Peserta::all()->where('user_id',$id);
        return view('biodata.index',compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $peserta = Peserta::all()->where('user_id',$id);
        if(isset($peserta)){
            Session::flash('flash_message','Sudah mempunyai Biodata.');
            return redirect('/biodata');
        }else{
            return "daftar";
        }
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

        return view('biodata.edit',compact('peserta'));
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
