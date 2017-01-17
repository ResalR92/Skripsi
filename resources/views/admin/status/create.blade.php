@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Status Peserta</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Peserta
		            </li>
		            <li>
		                Status Peserta
		            </li>
		            <li class="active">
		                Tambah
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::open(['url'=>'admin/status']) !!}
            @include('admin.status._form',['submitButtonText'=>'Tambah'])
        {!! Form::close() !!}	
	</div>
@stop