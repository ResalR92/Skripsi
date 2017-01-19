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
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>Statistik Peserta</h4>
						<canvas id="chartPenulis" width="400" height="150"></canvas>
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
				backgroundColor: "rgba(151,187,205,0.5)",
				borderColor: "rgba(151,187,205,0.8)",
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

		var ctx = document.getElementById("chartPenulis").getContext("2d");

		var authorChart = new Chart(ctx, {
			type: 'bar',
			data: data,
			options: options
		});
	</script>
@endsection