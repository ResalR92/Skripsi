@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Status Peserta</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/peserta') }}">Peserta</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/status') }}">Status Peserta</a>
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($status, ['method'=>'PATCH','action'=>['StatusController@update',$status->id]]) !!}
            @include('admin.status._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop