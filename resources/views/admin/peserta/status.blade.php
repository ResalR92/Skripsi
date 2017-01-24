@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Status <small>{{ $peserta->nama }}</small></h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/peserta') }}">Peserta</a>
		            </li>
		            <li>
		            	<a href="{{ url('admin/peserta/'.$peserta->id) }}">{{ $peserta->nama }}</a>
		            </li>
		            <li class="active">
		                Edit Status
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::model($peserta, ['method'=>'PATCH','action'=>['PesertaController@updateStatus',$peserta->id],'files'=>true]) !!}
			<div class="form-horizontal">
				@if($errors->any())
			    	<div class="form-group {{ $errors->has('id_status') ? 'has-error' : 'has-success' }}">
			    @else
			        <div class="form-group">
			    @endif
			            {!! Form::label('id_status', 'Status', ['class'=>'col-md-1 control-label']) !!}
			            <div class="col-md-3">
				            @if(count($list_status) > 0)
				                {!! Form::select('id_status', $list_status, null, ['class'=>'form-control','id'=>'id_status','placeholder'=>'Pilih status']) !!}
				            @else
				                <p>Tidak ada pilihan status, buat dulu ya...!</p>
				            @endif
				            @if($errors->has('id_status'))
				                <span class="help-block">{{ $errors->first('id_status') }}</span>
				            @endif
				        </div>
			        </div>
	            <div class="form-group">
			        <div class="col-md-2 col-md-offset-1">
			            {!! Form::submit('Update Status', ['class'=>'btn btn-primary form-control']) !!}
			        </div>
			    </div>
		    </div>
        {!! Form::close() !!}
	</div>
@stop
