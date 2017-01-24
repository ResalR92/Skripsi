<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Daftar;
use App\Peserta;
use Laratrust\LaratrustFacade as Laratrust;

class SettingController extends Controller
{
    //hanya untuk yang sudah login
    public function __construct()
	{
		$this->middleware('auth');
	}
    //form edit password -> peserta
	public function editPassword(Request $request)
    {	
        //memastikan hanya peserta yang aktif hanya bisa mengubah passwordnya
        $peserta = $request->user()->peserta()->get()->toArray();
        $daftar = Daftar::all()->where('aktif',1)->toArray();

        if(empty($peserta) && empty($daftar) && Laratrust::hasRole('peserta')){
            Auth::logout();
            return redirect('/');
        }
        
    	return view('setting.edit-password');
    }
    //form edit password -> admin
    public function editPasswordAdmin()
    {	
    	return view('setting.edit-password-admin');
    }
    //update password -> peserta
    public function updatePassword(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,//membuat custom validasi passcheck
    		'new_password' => 'required|confirmed|min:6',
    	],
    	[
    		'password.passcheck' => 'Password lama tidak sesuai',//menyesuaikan pesan error passcheck
    	]);

    	$user->password = bcrypt($request->get('new_password'));
    	$user->save();

    	Session::flash('flash_message','Password berhasil diubah.');
    	return redirect('setting/password');
    }
    //update password ->admin
    public function updatePasswordAdmin(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,//membuat custom validasi passcheck
    		'new_password' => 'required|confirmed|min:6',//menyesuaikan pesan error passcheck
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
