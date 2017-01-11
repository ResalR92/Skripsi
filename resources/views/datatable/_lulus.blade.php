@if(App\Peserta::where('lulus','0'))
	<a href="{{ $lulus_url }}" class="btn btn-danger btn-xs">
		<i class="glyphicon glyphicon-remove"></i>
	</a>
@elseif(App\Peserta::where('lulus','1'))
	<a href="{{ $no_lulus_url }}" class="btn btn-success btn-xs">
		<i class="glyphicon glyphicon-ok"></i>
	</a>
@endif