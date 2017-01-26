@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Isi Biodata</h1>
		    </div>
		</div>
        {!! Form::open(['url'=>'biodata','files'=>true]) !!}
            @include('biodata._form',['submitButtonText'=>'Submit'])
        {!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('layouts.footer')
@endsection
