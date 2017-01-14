@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Kontak</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Kontak
		            </li>
		            <li class="active">
		                Tambah
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::open(['url'=>'admin/kontak']) !!}
            @include('admin.kontak._form',['submitButtonText'=>'Tambah'])
        {!! Form::close() !!}	
	</div>
@stop