@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Pengumuman</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Pengumuman
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($pengumuman, ['method'=>'PATCH','action'=>['PengumumanController@update',$pengumuman->id]]) !!}
            @include('admin.pengumuman._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop