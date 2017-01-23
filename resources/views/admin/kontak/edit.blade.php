@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Balas Kontak</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/kontak') }}">Kontak</a>
		            </li>
		            <li class="active">
		                Balas
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($kontak, ['method'=>'PATCH','action'=>['KontakController@update',$kontak->id]]) !!}
            @include('admin.kontak._form_balas',['submitButtonText'=>'Kirim'])
        {!! Form::close() !!}	
	</div>
@stop