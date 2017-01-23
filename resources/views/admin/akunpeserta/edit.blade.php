@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Akun Peserta</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/akunpeserta') }}">Akun Peserta</a>
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($akunpeserta, ['method'=>'PATCH','action'=>['AkunpesertaController@update',$akunpeserta->id]]) !!}
            @include('admin.akunpeserta._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop