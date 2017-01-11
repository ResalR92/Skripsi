@if(App\Peserta::where('verifikasi','0'))
	<a href="{{ $valid_url }}" class="btn btn-danger btn-xs">
		<i class="glyphicon glyphicon-remove"></i>
	</a>
@elseif(App\Peserta::where('verifikasi','1'))
	<a href="{{ $no_valid_url }}" class="btn btn-success btn-xs">
		<i class="glyphicon glyphicon-ok"></i>
	</a>
@endif