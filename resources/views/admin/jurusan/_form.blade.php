@if(isset($jurusan))
    {!! Form::hidden('id', $jurusan->id) !!}
@endif
<div class="row">
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama', 'Nama Jurusan', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('nama', null, ['class'=>'form-control']) !!}
                @if($errors->has('nama'))
                    <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
            </div>
        </div>
    <br><br>
</div>

<div class="row">
    <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>
    