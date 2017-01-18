@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Jadwal</h1>
		    </div>
		</div>
		<table class="table table-striped table-responsive">
			<thead>
				<tr>
					<th width="250">Jadwal</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
				@if(!empty($jadwal_list))
					@foreach($jadwal_list as $jadwal)
						<tr>
							<td>{{ $jadwal->kegiatan }}</td>
							<td>{{ $jadwal->awal->format('d-m-Y') }} - {{ $jadwal->akhir->format('d-m-Y') }}</td>
						</tr>
					@endforeach
				@else
					<p>Tidak ada jadwal</p>
				@endif
			</tbody>
		</table>
	</div>
@stop
