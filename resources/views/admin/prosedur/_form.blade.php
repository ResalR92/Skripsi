@if(isset($prosedur))
    {!! Form::hidden('id', $prosedur->id) !!}
@endif
<div class="row">
    @if($errors->any())
        <div class="form-group {{ $errors->has('judul') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('judul', null, ['class'=>'form-control']) !!}
                @if($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('isi') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('isi', 'Isi', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('isi', null, ['class'=>'form-control editor','rows'=>'7']) !!}
                @if($errors->has('isi'))
                    <span class="help-block">{{ $errors->first('isi') }}</span>
                @endif
            </div>
        </div>
    
</div>
<br><br>
<div class="row">
    <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>
    