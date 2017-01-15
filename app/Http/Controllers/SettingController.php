<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function editPassword()
    {	
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

    	Session::flash('flash_notification',[
    		'level' => 'success',
    		'message' => 'Password berhasil diubah'
    	]);
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
    	return redirect('admin/password');
    }
}
