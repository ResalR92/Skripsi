@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Peserta</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li class="active">
		                Peserta
		            </li>
		        </ol>
		    </div>
		</div>
		{!! $html->table(['class'=>'table-striped']) !!}
		@role('admin')
			<a href="{{ url('admin/status') }}" class="btn btn-primary">Status Peserta</a>
		@endrole
	</div>
@stop

@section('scripts')
	{!! $html->scripts() !!}
@endsection