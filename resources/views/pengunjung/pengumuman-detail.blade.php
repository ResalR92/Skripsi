@extends('layouts.peserta')
@section('content')
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="container-fluid">
						<h1><b>{{ $pengumuman->judul }}</b></h1>
						<span><i class="glyphicon glyphicon-calendar"></i> {{ $pengumuman->updated_at->formatLocalized('%d %B %Y') }}</span>
						<p>{!! $pengumuman->isi !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('layouts.footer')
@endsection