@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Dashboard <small>Statistik Website</small></h1>
		        
		        <ol class="breadcrumb">
		            <li class="active">
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		        </ol>
		    </div>
		</div>
		
		<div class="row">
		    <div class="col-lg-4 col-md-6">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-users fa-5x"></i> 
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge">{{ $jml_peserta }}</div>
		                        <div>Peserta</div>
		                    </div>
		                </div>
		            </div>
		            <a href="{{ url('admin/peserta') }}">
		                <div class="panel-footer">
		                    <span class="pull-left">Tampilkan Semua</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		    
		    <div class="col-lg-4 col-md-6">
		        <div class="panel panel-green">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-graduation-cap fa-5x"></i>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge">{{ $jml_jurusan }}</div>
		                        <div>Jurusan</div>
		                    </div>
		                </div>
		            </div>
		            <a href="{{ url('admin/jurusan') }}">
		                <div class="panel-footer">
		                    <span class="pull-left">View Details</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		    
		    <div class="col-lg-4 col-md-6">
		        <div class="panel panel-yellow">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-phone-square fa-5x"></i>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge">{{ $jml_kontak }}</div>
		                        <div>Kontak</div>
		                    </div>
		                </div>
		            </div>
		            <a href="{{ url('admin/kontak') }}">
		                <div class="panel-footer">
		                    <span class="pull-left">View Details</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"; ?></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-9 visible-md-block visible-lg-block">
				<div class="panel panel-info">
					<div class="panel-body" style="opacity:0.9;">
						<h2><span class="label label-info">Statistik Peserta</span><h2>
						<canvas id="chartJurusan"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-body">
						<h3><span class="label label-info">Statistik Jurusan</span><h3>
						@if(!empty($jurusan_list))
							@foreach($jurusan_list as $jurusan)
								<small>{{ $jurusan->nama }}</small>
								<div class="progress">
								  	<div class="progress-bar progress-bar-success" 
								  		role="progressbar" aria-valuenow="{{ $jurusan->peserta->count() }}" aria-valuemin="0" aria-valuemax="{{ $jurusan->kapasitas }}" style="width: {{ ($jurusan->peserta->count()/$jurusan->kapasitas)*100 }}%">
										{{ floor(($jurusan->peserta->count()/$jurusan->kapasitas)*100) }}%
								  	</div>
								</div>
							@endforeach
						@else
							tidak ada data	
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<script src="{{ asset('js/Chart.min.js') }}"></script>
	<script type="text/javascript">
		var data = {
			labels: {!! json_encode($tb_jurusan) !!},
			datasets: [{
				label:'Jumlah Peserta',
				data: {!! json_encode($tb_peserta) !!},
				backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
			}]
		};

		var options = {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true,
						stepSize: 1
					}
				}]
			}
		};

		var ctx = document.getElementById("chartJurusan").getContext("2d");

		var authorChart = new Chart(ctx, {
			type: 'bar',
			data: data,
			options: options
		});
	</script>
@endsection