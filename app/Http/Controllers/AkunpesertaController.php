<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;


class AkunpesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $akunpeserta = Role::where('name','peserta')->first()->users;
            return Datatables::of($akunpeserta)
                ->addColumn('action',function($akunpeserta){
                    return view('datatable._action',[
                        'model' => $akunpeserta,
                        'form_url' => route('akunpeserta.destroy',$akunpeserta->id),
                        'edit_url' => route('akunpeserta.edit',$akunpeserta->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Akun Peserta '.$akunpeserta->nama.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'name','name'=>'name','title'=>'Nama'])
            ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('admin.akunpeserta.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akunpeserta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request,[
            'name' => 'required|max:255',
            'email'=> 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        //Hash Password
        $data['password'] = bcrypt($data['password']);

        // return $data;
        $akunpeserta = User::create($data);

        //set role 
        $pesertaRole = Role::where('name','peserta')->first();
        $akunpeserta->attachRole($pesertaRole);
        
        Session::flash('flash_message','Data user berhasil disimpan');

        return redirect('admin/akunpeserta');
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
        $akunpeserta = User::findOrFail($id);
        return view('admin.akunpeserta.edit',compact('akunpeserta'));
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
        $user = User::findOrFail($id);
        $data = $request->all();

        $this->validate($request,[
            'name' => 'required|max:255',
            'email'=> 'required|email|max:100|unique:users,email,'.$id,
            'password' => 'sometimes|confirmed|min:6',
        ]);

        if($request->has('password')){
            //Hash password
            $data['password'] = bcrypt($data['password']);
        }else{
            //Hapus password (password tidak diupdate)
            $data = array_except($data,['password']);
        }

        $user->update($data);

        Session::flash('flash_message','Data user berhasil diupdate');

        return redirect('admin/akunpeserta');
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
