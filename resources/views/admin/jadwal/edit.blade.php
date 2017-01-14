@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Jadwal</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Jadwal
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($jadwal, ['method'=>'PATCH','action'=>['JadwalController@update',$jadwal->id]]) !!}
            @include('admin.jadwal._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop