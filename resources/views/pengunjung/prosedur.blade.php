@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Prosedur</h1>
		    </div>
		</div>
		<table class="table">
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
							<td>{{ $prosedur->isi }}</td>
						</tr>
					@endforeach
				@else
					<p>Tidak ada prosedur</p>
				@endif
			</tbody>
		</table>
	</div>
@stop
