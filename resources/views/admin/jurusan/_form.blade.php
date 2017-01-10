<table class="table-responsive table">
    <tbody>
        <tr>
            <td style="width: 200px;">{!! Form::label('jurusan', 'Nama Jurusan', ['class'=>'control-label']) !!}</td>
            <td style="width: 1px;">:</td>
            <td>
                {!! Form::text('jurusan', null, ['class'=>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}</td>
        </tr>
    </tbody>

</table>