@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Kontak</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                Kontak
		            </li>
		        </ol>
		    </div>
		</div>
		{!! $html->table(['class'=>'table-striped']) !!}
	</div>
@stop

@section('scripts')
	{!! $html->scripts() !!}
@endsection