@if(isset($kontak))
    {!! Form::hidden('id', $kontak->id) !!}
    {!! Form::hidden('nama', $kontak->nama) !!}
    {!! Form::hidden('email',$kontak->email) !!}
    {!! Form::hidden('judul', $kontak->judul) !!} 
    {!! Form::hidden('isi', $kontak->isi) !!}
    {!! Form::hidden('dibalas', true) !!}
@endif
<div class="row">
    <div class="form-group">
        {!! Form::label('nama', 'Nama', ['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::label('nama', $kontak->nama, ['class'=>'control-label']) !!}
        </div>
    </div>
    <br><br>
    <div class="form-group">
        {!! Form::label('email', 'Email', ['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::label('email', $kontak->email, ['class'=>'control']) !!}
        </div>
    </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('judul') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('judul', 'Re:'.$kontak->judul, ['class'=>'form-control']) !!}
                @if($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    <div class="form-group">
        {!! Form::label('isi', 'Isi', ['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! $kontak->isi !!}
        </div>
    </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('isi') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('balasan', 'Balasan', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('balasan', null, ['class'=>'form-control editor','rows'=>'7']) !!}
                @if($errors->has('balasan'))
                    <span class="help-block">{{ $errors->first('balasan') }}</span>
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
    