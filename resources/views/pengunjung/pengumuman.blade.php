@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Pengumuman</h1>
		    </div>
		</div>
		@if(!empty($pengumuman_list))
			@foreach($pengumuman_list as $pengumuman)
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3><b>{{ $pengumuman->judul }}</b></h3>
							<hr>
							<p>{!! $pengumuman->isi !!}</p>
						</div>
						<div class="panel-footer">
							<span><i class="glyphicon glyphicon-time"></i> {{ $pengumuman->updated_at->formatLocalized('%d %B %Y') }}</span>
						</div>
					</div>
				</div>
			@endforeach
			<div>
				{{ $pengumuman_list->links() }}
			</div>
		@else
			<p>Tidak ada data Pengumuman.</p>
		@endif
		
	</div>
@stop

@section('footer')
	@include('layouts.footer')
@endsection