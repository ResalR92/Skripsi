@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Biodata</h1>
		        @include('_partial.flash_message')
		        @if(empty($status))
		        	{{ link_to('biodata/create','Isi Biodata',['class'=>'btn btn-primary']) }}
		        @endif
		    </div>
		</div>
		@if(isset($peserta))
			@foreach($peserta as $biodata)
				<div class="row">
					<div class="col-md-2 col-md-offset-1">
						@if(isset($biodata->foto))
							{!! Html::image(asset('fotoupload/'.$biodata->foto),null,['class'=>'img-rounded img-responsive','width'=>'200px']) !!}
						@else
							@if($biodata->jenis_kelamin == 'L')
								<img src="{{ asset('fotoupload/dummymale.jpg') }}">
							@else
								<img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
							@endif
						@endif
						<hr>
						@if($biodata->status->label == 'warning')
							{{ link_to('biodata/'.$biodata->id.'/edit','Edit',['class'=>'btn btn-warning']) }}
						@elseif($biodata->status->label == 'success')
							{{ link_to('biodata/'.$biodata->id,'Cetak PDF',['class'=>'btn btn-success']) }}
						@endif
					</div>
					<div class="col-md-6">
						<table class="table table-striped">
							<tr>
								<th width="150">No. Pendaftaran</th>
								<td>{{ $biodata->id }}</td>
							</tr>
							<tr>
								<th>Nama Lengkap</th>
								<td>{{ $biodata->nama }}</td>
							</tr>
							<tr>
								<th>Program Keahlian</th>
								<td>{{ $biodata->jurusan->nama }}</td>
							</tr>
							<tr>
								<th>Sekolah Asal</th>
								<td>{{ $biodata->sekolah->nama }}</td>
							</tr>
							<tr>
								<th>Status</th>
								<td><h1><span class="label label-{{ $biodata->status->label }}">{{ $biodata->status->nama }}</span></h1></td>
							</tr>
							<tr>
								<th></th>
								<td>{{ $biodata->status->pesan }}</td>
							</tr>
						</table>
					</div>
				</div>
			@endforeach
		@else
			<p>create</p>
			<a href="#">Create</a>
		@endif
	</div>	
@stop