@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Daftar Peserta</h1>
		    </div>
		</div>
		{!! $html->table(['class'=>'table-striped']) !!}
	</div>
@stop

@section('footer')
	@include('layouts.footer')
@endsection

@section('scripts')
	{!! $html->scripts() !!}
@endsection