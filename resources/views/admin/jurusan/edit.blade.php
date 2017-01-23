@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Jurusan</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/jurusan') }}">Jurusan</a>
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($jurusan, ['method'=>'PATCH','action'=>['JurusanController@update',$jurusan->id]]) !!}
            @include('admin.jurusan._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop