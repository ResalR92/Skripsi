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
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($operator, ['method'=>'PATCH','action'=>['OperatorController@update',$operator->id]]) !!}
            @include('admin.operator._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop