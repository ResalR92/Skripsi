@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Biodata Peserta</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                Biodata Peserta
		            </li>
		        </ol>
		    </div>
		</div>
		
		<div class="container-fluid">
			<div class="jumbotron bio-preview">
				<h2>DATA CALON PESERTA DIDIK</h2>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<dl class="dl-horizontal">
							<dt>No. Pendaftaran</dt>
							<dd>: {{ $peserta->id }}</dd>
						</dl>
						<dl class="dl-horizontal">
							<dt>Program Keahlian</dt>
							<dd>: {{ $peserta->jurusan->nama }}</dd>
						</dl>
					</div>
					<div class="col-md-6">
						{!! Html::image(asset('fotoupload/'.$peserta->foto),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
					</div>
				</div>
				
			    
			    

			</div> <!-- jumbotron end -->

		<p><a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Cetak</a></p>
	</div>
@stop