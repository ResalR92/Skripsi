@if($verifikasi == false)
	<a href="{{ $valid_url }}" class="btn btn-danger btn-xs">
		<i class="glyphicon glyphicon-remove"></i>
	</a>
@elseif($verifikasi == true)
	<a href="{{ $no_valid_url }}" class="btn btn-success btn-xs">
		<i class="glyphicon glyphicon-ok"></i>
	</a>
@endif