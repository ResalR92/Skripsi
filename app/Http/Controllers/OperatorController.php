<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()){
            $operator = Role::where('name','operator')->first()->users;
            return Datatables::of($operator)
                //Menambah kolom login -> karena Carbon -> konflik -> datatable
                ->addColumn('login',function($operator){
                    //mengecek nilai last_login
                    if(!empty($operator->last_login)){
                        $operator = $operator->last_login->format('d-m-Y H:i:s');
                    }else{
                        //nilai default untuk menghindari crash datatable
                        $operator = '-';
                    }
                    return $operator;
                    })
                //menambah kolom blokir->danger,success
                ->addColumn('blokir',function($operator){
                        if($operator->is_blokir == true){
                            return '<span class="label label-danger">Blokir</span>';
                        }elseif($operator->is_blokir == false){
                            return '<span class="label label-success">Aktif</span>';
                        }
                    })
                //menambah kolom ACTION -> edit, delete -> datatable._admin.blade.php
                ->addColumn('action',function($operator){
                    return view('datatable._admin',[
                        'model' => $operator,
                        'form_url' => route('operator.destroy',$operator->id),
                        'edit_url' => route('operator.edit',$operator->id),
                        'confirm_message'=>'Apakah Anda yakin menghapus Operator '.$operator->nama.'?'
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data'=>'name','name'=>'name','title'=>'Nama','orderable'=>false])
            ->addColumn(['data'=>'email','name'=>'email','title'=>'Email','orderable'=>false])
            ->addColumn(['data'=>'login','name'=>'login','title'=>'Login Terakhir','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'blokir','name'=>'blokir','title'=>'Status','orderable'=>false,'searchable'=>false])
            ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);

        return view('admin.operator.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operator.create');
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

        //menyimpan data operator
        $operator = User::create($data);

        //set role->operator
        $operatorRole = Role::where('name','operator')->first();
        $operator->attachRole($operatorRole);
        
        Session::flash('flash_message','Data user berhasil disimpan');

        return redirect('admin/operator');
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
        $operator = User::findOrFail($id);
        return view('admin.operator.edit',compact('operator'));
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
            'is_blokir' => 'required',
        ]);

        if($request->has('password')){
            //Hash password
            $data['password'] = bcrypt($data['password']);
        }else{
            //Hapus password (password tidak diupdate)
            $data = array_except($data,['password']);
        }

        $user->update($data);

        Session::flash('flash_message','Data Operator berhasil diupdate');

        return redirect('admin/operator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = User::findOrFail($id);
        //mengecek role -> operator
        if ($operator->hasRole('operator')) {
            //menghapus operator
            $operator->delete();

            Session::flash('flash_message','Data Operator berhasil dihapus.');
            Session::flash('penting',true);
        }
        
        return redirect('admin/operator');
    }
}
