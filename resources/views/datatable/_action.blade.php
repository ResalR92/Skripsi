{!! Form::model($model, ['url'=>$form_url,'method'=>'delete','class'=>'form-inline']) !!}
	<a href="{{ $edit_url }}" class="btn btn-warning btn-xs">Edit</a> | 
	{!! Form::submit('Hapus', ['class'=>'btn btn-danger btn-xs']) !!}
{!! Form::close() !!}