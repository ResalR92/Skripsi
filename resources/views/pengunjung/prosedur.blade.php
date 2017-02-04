@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header"><b>Prosedur</b></h1>
		    </div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-striped table-responsive">
					<thead>
						<tr>
							<th width="250">Prosedur</th>
							<th>Penjelasan</th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($prosedur_list))
							@foreach($prosedur_list as $prosedur)
								<tr>
									<td>{{ $prosedur->judul }}</td>
									<td>{!! $prosedur->isi !!}</td>
								</tr>
							@endforeach
						@else
							<p>Tidak ada prosedur</p>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('layouts.footer')
@endsection
