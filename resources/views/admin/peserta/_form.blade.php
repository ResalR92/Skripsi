@if(isset($peserta))
    {!! Form::hidden('id', $peserta->id) !!}
@endif

@if($errors->any())
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
        <table class="table-responsive table">
            <tbody>
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>A. IDENTITAS PRIBADI CALON SISWA</b></h4>
                        <tr>
                            <td style="width: 200px;">{!! Form::label('nama', 'Nama Lengkap', ['class'=>'control-label']) !!}</td>
                            <td style="width: 1px;">:</td>
                            <td>
                                {!! Form::text('nama', null, ['class'=>'form-control']) !!}
                                @if($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                            </td>
                        </tr>
                    </div>
                </div>
                
                <tr>
                    <td></td>
                    <td></td>
                    {{-- <td>{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}</td> --}}
                    <td>
                        <div class="col-md-2">
                            {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>  