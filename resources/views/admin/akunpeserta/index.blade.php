@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Akun Peserta</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                Akun Peserta
		            </li>
		        </ol>
		    </div>
		</div>
		<p><a href="{{ route('akunpeserta.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a></p>
			{!! $html->table(['class'=>'table-striped']) !!}
	</div>
@stop

@section('scripts')
	{!! $html->scripts() !!}
@endsection
