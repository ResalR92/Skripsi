{!! Form::model($model, ['url'=>$form_url,'method'=>'delete','class'=>'form-inline js-confirm','data-confirm'=>$confirm_message]) !!}
	<a href="{{ $edit_url }}" class="btn btn-warning btn-xs" title="edit">
		<i class="glyphicon glyphicon-edit"></i>
	</a> 
	@role('admin')
		<button type="submit" class="btn btn-danger btn-xs" title="hapus">
			<i class="glyphicon glyphicon-trash"></i>
		</button>
	@endrole
{!! Form::close() !!}