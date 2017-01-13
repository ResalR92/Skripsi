@if($lulus == false )
	<a href="{{ $lulus_url }}" class="btn btn-danger btn-xs">
		<i class="glyphicon glyphicon-remove"></i>
	</a>
@elseif($lulus == true)
	<a href="{{ $no_lulus_url }}" class="btn btn-success btn-xs">
		<i class="glyphicon glyphicon-ok"></i>
	</a>
@endif