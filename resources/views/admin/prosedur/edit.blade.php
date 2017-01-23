@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Prosedur</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/prosedur') }}">Prosedur</a>
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($prosedur, ['method'=>'PATCH','action'=>['ProsedurController@update',$prosedur->id]]) !!}
            @include('admin.prosedur._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop