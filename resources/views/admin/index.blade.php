@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">My Admin</h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                My Admin
		            </li>
		        </ol>
		    </div>
		</div>
		
		@if(isset($admin))
			@foreach($admin as $user)
				<div class="row">
					<div class="col-md-2 col-md-offset-1">
						@if(isset($user->foto))
							{!! Html::image(asset('fotoupload/'.$user->foto),null,['class'=>'img-rounded img-responsive','width'=>'200px']) !!}
						@else
							<img src="{{ asset('fotoupload/dummymale.jpg') }}">
						@endif
						<hr>
						<a href="{{ url('admin/password') }}" class="btn btn-primary">
                             <i class="fa fa-btn fa-lock"></i> Ubah Password
                        </a>
					</div>
					<div class="col-md-6">
						<table class="table table-striped">
							<tr>
								<th>Nama</th>
								<td>{{ $user->name }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $user->email }}</td>
							</tr>
							<tr>
								<th>Login Terakhir</th>
								<td>{{ $user->last_login->format('d-m-Y H:i:s') }}</td>
							</tr>
						</table>
					</div>
				</div>
			@endforeach
		@endif
	</div>
@stop