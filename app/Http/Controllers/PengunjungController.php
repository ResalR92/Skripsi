<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\User;
use App\Jurusan;
use App\Sekolah;
use App\Pengumuman;
use App\Prosedur;
use App\Jadwal;
use App\Kontak;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Laratrust\LaratrustFacade as Laratrust;
use App\Daftar;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
	public function index()
	{
        //memastikan pendafftaran masih aktif
        $daftar = Daftar::all()->where('aktif',1)->toArray();
        if(Laratrust::hasRole('peserta')){
            //meredirect peserta ke home->biodata
            return redirect('/home');
        }
		return view('dashboard.pengunjung',compact('daftar'));
	}

    //menampilkan daftar peserta
    public function peserta(Request $request, Builder $htmlBuilder)
    {
    	if($request->ajax()){
            $peserta = Peserta::with(['sekolah','jurusan']);
            return Datatables::of($peserta)
                ->addColumn('status',function($peserta){
                    return view('datatable._status',[
                        'status'=>$peserta->status->nama,
                        'label' =>$peserta->status->label,
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama Peserta'])
            ->addColumn(['data'=>'jurusan.nama','name'=>'jurusan.nama','title'=>'Program Keahlian'])
            ->addColumn(['data'=>'sekolah.nama','name'=>'sekolah.nama','title'=>'Sekolah Asal'])
            ->addColumn(['data'=>'status','name'=>'status','title'=>'Status','orderable'=>false,'searchable'=>false]);

        $this->pendaftaranTutup($request);

        return view('pengunjung.peserta',compact('html'));
    }
    //menampilkan pengumuman
    public function pengumuman(Request $request)
    {
    	$pengumuman_list = Pengumuman::latest()->paginate(1);
        $this->pendaftaranTutup($request);
    	return view('pengunjung.pengumuman',compact('pengumuman_list'));
    }
    //menampilkan prosedur
    public function prosedur(Request $request)
    {
    	$prosedur_list = Prosedur::all()->sortBy('judul');
        $this->pendaftaranTutup($request);
    	return view('pengunjung.prosedur',compact('prosedur_list'));
    }
    //menampilkan jadwal
    public function jadwal(Request $request)
    {
    	$jadwal_list = Jadwal::all()->sortBy('awal');
        $this->pendaftaranTutup($request);
    	return view('pengunjung.jadwal',compact('jadwal_list'));
    }
    //menampilkan kontak
    public function kontak(Request $request)
    {
        $this->pendaftaranTutup($request);
    	return view('pengunjung.kontak');
    }
    //mengirim kontak->store
    public function kirim(Request $request)
    {
    	$this->validate($request, [
            'nama'=>'required|max:30',
            'email' => 'required|email|max:30',
            'judul' => 'required|max:50',
            'isi' =>'required',
        ]);
        $kontak = Kontak::create($request->all());

        Session::flash('flash_message','Data Kontak berhasil dikirim.');
        return redirect('kontak');
    }
    //fungsi untuk menutup akses pendaftaran->buka/tutup
    private function pendaftaranTutup($request)
    {
        if(Auth::user()){
            $peserta = $request->user()->peserta()->get()->toArray();
        }else{
            $peserta = '';
        }
        $daftar = Daftar::all()->where('aktif',1)->toArray();

        if(empty($peserta) && empty($daftar) && Laratrust::hasRole('peserta')){
            Auth::logout();
        }
    }
}
