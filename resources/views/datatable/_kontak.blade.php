{!! Form::model($model, ['url'=>$form_url,'method'=>'delete','class'=>'form-inline js-confirm','data-confirm'=>$confirm_message,'title'=>'balas']) !!}
	<a href="{{ $edit_url }}" class="btn btn-primary btn-xs">
		<i class="glyphicon glyphicon-share"></i>
	</a> 
	@role('admin') 
		<button type="submit" class="btn btn-danger btn-xs" title="hapus">
			<i class="glyphicon glyphicon-trash"></i>
		</button>
	@endrole
{!! Form::close() !!}