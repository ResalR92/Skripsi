@if(isset($status))
    {!! Form::hidden('id', $status->id) !!}
@endif
<div class="row">
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama', 'Nama Status', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('nama', null, ['class'=>'form-control']) !!}
                @if($errors->has('nama'))
                    <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('label') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('label', 'Label', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::select('label', array(
                    'info' => 'Info',
                    'warning' => 'Edit',), null,['class'=>'form-control']) !!}
                @if($errors->has('label'))
                    <span class="help-block">{{ $errors->first('label') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pesan') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pesan', 'Pesan', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('pesan', null, ['class'=>'form-control']) !!}
                @if($errors->has('pesan'))
                    <span class="help-block">{{ $errors->first('pesan') }}</span>
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
    