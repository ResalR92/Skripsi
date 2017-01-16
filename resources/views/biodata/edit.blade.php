@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Edit Biodata</h1>
		    </div>
		</div>
		{!! Form::model($peserta, ['method'=>'PATCH','action'=>['BiodataController@update',$peserta->id],'files'=>true]) !!}
            @include('biodata._form',['submitButtonText'=>'Update'])
        {!! Form::close() !!}
	</div>
@stop
