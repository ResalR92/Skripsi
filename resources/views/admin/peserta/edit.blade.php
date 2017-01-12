@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Peserta</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Peserta
		            </li>
		            <li class="active">
		                Edit
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($peserta, ['method'=>'PATCH','action'=>['PesertaController@update',$peserta->id],'files'=>true]) !!}
            @include('admin.peserta._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}	
	</div>
@stop