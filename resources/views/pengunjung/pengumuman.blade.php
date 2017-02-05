@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header"><b>Pengumuman</b></h1>
		    </div>
		</div>
		@if(!empty($pengumuman_list))
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="container-fluid">
						@foreach($pengumuman_list as $pengumuman)
							<h3><a href="pengumuman/{{ $pengumuman->id }}"><b>{{ $pengumuman->judul }}</b></a></h3>
							<span><i class="glyphicon glyphicon-calendar"></i> {{ $pengumuman->updated_at->formatLocalized('%d %B %Y') }}</span>
							<hr>
						@endforeach
					</div>
					
				</div>
			</div>
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