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
		                        <div class="huge">3</div>
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
		                        <div class="huge">3</div>
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
		                        <div class="huge">3</div>
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
	</div>
@stop