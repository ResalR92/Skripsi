<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Daftar;
use App\Peserta;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peserta = $request->user()->peserta()->get()->toArray();
        $daftar = Daftar::all()->where('aktif',1)->toArray();

        if(empty($peserta) && empty($daftar)){
            Auth::logout();
            Session::flash('flash_error','Maaf, Pendaftaran sudah DITUTUP.');
            Session::flash('penting',true);
            return redirect('/');
        }

        return view('home');
    }
}
