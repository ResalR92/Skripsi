@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Status Peserta</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/peserta') }}">Peserta</a>
		            </li>
		            <li class="active">
		                Status Peserta
		            </li>
		        </ol>
		    </div>
		</div>
		<p>
			<a href="{{ route('status.create') }}" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah
			</a>
		</p>
		{!! $html->table(['class'=>'table-striped']) !!}
	</div>
@stop

@section('scripts')
	{!! $html->scripts() !!}
@endsection