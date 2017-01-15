@if(isset($operator))
    {!! Form::hidden('id', $operator->id) !!}
@endif
<div class="row">
    @if($errors->any())
        <div class="form-group {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('email','Email:',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('email',null,['class'=>'form-control']) !!}
                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if(isset($operator))
        @if($errors->any())
            <div class="form-group {{ $errors->has('is_blokir') ? 'has-error' : 'has-success' }}">
        @else
            <div class="form-group">
        @endif
                {!! Form::label('is_blokir','Status',['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    <div class="radio">
                        <label>{{ Form::radio('is_blokir',false) }} Aktif</label>
                    </div>
                    <div class="radio">
                        <label>{{ Form::radio('is_blokir',true) }} Blokir</label>
                    </div>
                </div>
            </div>
        <br><br>
    @endif
    
    {{--Password--}}
    @if($errors->any())
        <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('password','Password:',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::password('password',['class'=>'form-control']) !!}
                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    {{--Password Confirmation--}}
    @if($errors->any())
        <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('password_confirmation','Password Confirmation',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                @if($errors->has('password_confirmation'))
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
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
    