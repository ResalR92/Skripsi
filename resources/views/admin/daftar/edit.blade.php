@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Status Pendaftaran</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li class="active">
		                Status Pendaftaran
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($daftar, ['method'=>'PATCH','action'=>['AdminController@updateDaftar',$daftar->id]]) !!}
            @if(isset($daftar))
			    {!! Form::hidden('id', $daftar->id) !!}
			@endif
			<div class="form-horizontal">
			    @if($errors->any())
			        <div class="form-group {{ $errors->has('aktif') ? 'has-error' : 'has-success' }}">
			    @else
			        <div class="form-group">
			    @endif
			            {!! Form::label('aktif', 'Status', ['class'=>'col-md-1 control-label']) !!}
			            <div class="col-md-3">
			                {!! Form::select('aktif', array(
			                    1 => 'Dibuka',
			                    0 => 'Ditutup',), null,['class'=>'form-control']) !!}
			                @if($errors->has('aktif'))
			                    <span class="help-block">{{ $errors->first('aktif') }}</span>
			                @endif
			            </div>
			        </div>
			    
			    <div class="form-group">
			        <div class="col-md-2 col-md-offset-1">
			            {!! Form::submit('Update', ['class'=>'btn btn-primary form-control']) !!}
			        </div>
			    </div>
			</div>
        {!! Form::close() !!}	
	</div>
@stop