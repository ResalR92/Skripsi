@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Operator</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/operator') }}">Operator</a>
		            </li>
		            <li class="active">
		                Tambah
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::open(['url'=>'admin/operator']) !!}
            @include('admin.operator._form',['submitButtonText'=>'Tambah'])
        {!! Form::close() !!}	
	</div>
@stop