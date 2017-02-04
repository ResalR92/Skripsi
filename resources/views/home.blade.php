@extends('layouts.peserta')

@section('content')
<div class="container">
	@if(!empty($status))
		@foreach($peserta as $biodata)
			<div class="panel panel-default" style="margin-top:-18px;">
                <div class="panel-body">
                    <div class="container-fluid">
                    	<div class="row">
						    <div class="col-lg-12">
						        <h1><b>Biodata</b></h1>
						        @include('_partial.flash_message')
						        
						    </div>
						</div>
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
								@elseif($biodata->status->label == 'primary')
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
					</div>
				</div>
			</div>
		@endforeach
	@else
        @include('_partial.flash_message')
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container">
                    <div class="col-md-12">
				        <h1><b><u>Selamat Datang!</u></b></h1>
				        <h3>Halo, <strong> {{ Auth::user()->name }}</strong></h3>
				        <h4>Jika Anda belum melengkapi biodata, silakan melengkapinya. Klik tombol "<strong>Biodata</strong>" di bawah ini!</h4>
				        <p>{{ link_to('/biodata/create','Biodata',['class'=>'btn btn-primary btn-lg']) }}</p>
				    </div>
				</div>
			</div>
	    </div>
	@endif
</div>
@endsection

@section('footer')
	@include('layouts.footer')
@endsection
