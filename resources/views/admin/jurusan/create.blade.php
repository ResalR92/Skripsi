@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Jurusan</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Jurusan
		            </li>
		            <li class="active">
		                Tambah
		            </li>
		        </ol>
		    </div>
		</div>
		<form method="post" role="form">
		{!! Form::open(['url'=>route('jurusan.store')],['role'=>'form']) !!}
            @include('admin.jurusan._form')
        {!! Form::close() !!}	
	</div>
@stop