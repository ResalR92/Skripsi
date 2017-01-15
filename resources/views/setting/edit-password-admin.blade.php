@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">Ubah Password</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                Ubah Password
		            </li>
		        </ol>
			</div>
		</div>
		{!! Form::open(['url'=>url('/admin/password'),'method'=>'post','class'=>'form-horizontal']) !!}
			@if($errors->any())
		        <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
		    @else
		        <div class="form-group">
		    @endif
		    		{!! Form::label('password', 'Password lama', ['class'=>'col-md-3 control-label']) !!}
		            <div class="col-md-6">
		                {!! Form::password('password', ['class'=>'form-control']) !!}
		                @if($errors->has('password'))
		                    <span class="help-block">{{ $errors->first('password') }}</span>
		                @endif
		            </div>
		        </div>
		    @if($errors->any())
		        <div class="form-group {{ $errors->has('new_password') ? 'has-error' : 'has-success' }}">
		    @else
		        <div class="form-group">
		    @endif
		    		{!! Form::label('new_password', 'Password baru', ['class'=>'col-md-3 control-label']) !!}
		            <div class="col-md-6">
		                {!! Form::password('new_password', ['class'=>'form-control']) !!}
		                @if($errors->has('new_password'))
		                    <span class="help-block">{{ $errors->first('new_password') }}</span>
		                @endif
		            </div>
		        </div>
			@if($errors->any())
		        <div class="form-group {{ $errors->has('new_password-confirmation') ? 'has-error' : 'has-success' }}">
		    @else
		        <div class="form-group">
		    @endif
		    		{!! Form::label('new_password-confirmation', 'Konfirmasi Password baru', ['class'=>'col-md-3 control-label']) !!}
		            <div class="col-md-6">
		                {!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
		                @if($errors->has('new_password-confirmation'))
		                    <span class="help-block">{{ $errors->first('new_password-confirmation') }}</span>
		                @endif
		            </div>
		        </div>

		    <div class="form-group">
		        <div class="col-md-2 col-md-offset-3">
		            {!! Form::submit('Simpan', ['class'=>'btn btn-primary form-control']) !!}
		        </div>
		    </div>
		{!! Form::close() !!}
	</div>
@endsection