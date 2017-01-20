@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Backup Data Peserta <small>(Excel)</small></h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                Backup Data Peserta
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::open(['url'=>'#','method'=>'post','class'=>'form-horizontal']) !!}
			@if($errors->any())
		        <div class="form-group {{ $errors->has('jurusan') ? 'has-error' : 'has-success' }}">
		    @else
		        <div class="form-group">
		    @endif
				{!! Form::label('jurusan', 'Jurusan', ['class'=>'col-md-2 control-label']) !!}
				<div class="col-md-4">
					{!! Form::select('jurusan', $list_jurusan, null, [
						'class'=>'js-selectize',
						'multiple',
						'placeholder'=>'Pilih Jurusan'
					]) !!}
	                @if($errors->has('jurusan'))
	                    <span class="help-block">{{ $errors->first('jurusan') }}</span>
	                @endif
				</div>
			</div>
			@if($errors->any())
		        <div class="form-group {{ $errors->has('status') ? 'has-error' : 'has-success' }}">
		    @else
		        <div class="form-group">
		    @endif
				{!! Form::label('status', 'Status', ['class'=>'col-md-2 control-label']) !!}
				<div class="col-md-4">
					{!! Form::select('status', $list_status, null, [
						'class'=>'js-selectize',
						'multiple',
						'placeholder'=>'Pilih Status'
					]) !!}
					@if($errors->has('status'))
	                    <span class="help-block">{{ $errors->first('status') }}</span>
	                @endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 col-md-offset-2">
					{!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@stop