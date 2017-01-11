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