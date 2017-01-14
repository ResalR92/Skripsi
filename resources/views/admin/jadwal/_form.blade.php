@if(isset($jadwal))
    {!! Form::hidden('id', $jadwal->id) !!}
@endif
<div class="row">
    @if($errors->any())
        <div class="form-group {{ $errors->has('kegiatan') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('kegiatan', 'Kegiatan', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('kegiatan', null, ['class'=>'form-control']) !!}
                @if($errors->has('kegiatan'))
                    <span class="help-block">{{ $errors->first('kegiatan') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('awal') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('awal', 'Mulai berlaku', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::date('awal', !empty($jadwal) ? $jadwal->awal->format('Y-m-d') : null, ['class'=>'form-control','id'=>'awal']) !!}
                @if($errors->has('awal'))
                    <span class="help-block">{{ $errors->first('awal') }}</span>
                @endif
            </div>
        </div>
    <br><br>
    @if($errors->any())
        <div class="form-group {{ $errors->has('akhir') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('akhir', 'Berakhir', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::date('akhir', !empty($jadwal) ? $jadwal->akhir->format('Y-m-d') : null, ['class'=>'form-control','id'=>'akhir']) !!}
                @if($errors->has('akhir'))
                    <span class="help-block">{{ $errors->first('akhir') }}</span>
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
    