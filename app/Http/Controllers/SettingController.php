<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Daftar;
use App\Peserta;
use Laratrust\LaratrustFacade as Laratrust;

class SettingController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function editPassword(Request $request)
    {	
        $peserta = $request->user()->peserta()->get()->toArray();
        $daftar = Daftar::all()->where('aktif',1)->toArray();

        if(empty($peserta) && empty($daftar) && Laratrust::hasRole('peserta')){
            Auth::logout();
            return redirect('/');
        }
        
    	return view('setting.edit-password');
    }

    public function editPasswordAdmin()
    {	
    	return view('setting.edit-password-admin');
    }

    public function updatePassword(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,
    		'new_password' => 'required|confirmed|min:6',
    	],
    	[
    		'password.passcheck' => 'Password lama tidak sesuai',
    	]);

    	$user->password = bcrypt($request->get('new_password'));
    	$user->save();

    	Session::flash('flash_message','Password berhasil diubah.');
    	return redirect('setting/password');
    }
    public function updatePasswordAdmin(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,
    		'new_password' => 'required|confirmed|min:6',
    	],
    	[
    		'password.passcheck' => 'Password lama tidak sesuai',
    	]);

    	$user->password = bcrypt($request->get('new_password'));
    	$user->save();

    	Session::flash('flash_message','Password berhasil diubah.');
    	return redirect('admin/myadmin');
    }
}
