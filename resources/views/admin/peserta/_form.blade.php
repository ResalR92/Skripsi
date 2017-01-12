@if(isset($peserta))
    {!! Form::hidden('id', $peserta->id) !!}
    {!! Form::hidden('user_id', $peserta->user_id) !!}
    {!! Form::hidden('verifikasi', $peserta->verifikasi) !!}
    {!! Form::hidden('lulus', $peserta->lulus) !!}
@endif
{{-- {!! Form::hidden('user_id', $user_id) !!} --}}


<div class="container-fluid">
    @if($errors->any())
    <div class="form-group {{ $errors->has('id_jurusan') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('id_jurusan', 'Jurusan', ['class'=>'control-label']) !!}
            @if(count($list_jurusan) > 0)
                {!! Form::select('id_jurusan', $list_jurusan, null, ['class'=>'form-control','id'=>'id_jurusan','placeholder'=>'Pilih jurusan']) !!}
            @else
                <p>Tidak ada pilihan jurusan, buat dulu ya...!</p>
            @endif
            @if($errors->has('id_jurusan'))
                <span class="help-block">{{ $errors->first('id_jurusan') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('foto', 'Foto:') !!}
            {!! Form::file('foto') !!}
            @if($errors->has('foto'))
                <span class="help-block">{{ $errors->first('foto') }}</span>
            @endif
        </div>
        
    <h4><b>A. IDENTITAS CALON PESERTA</b></h4>
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama', 'Nama Lengkap', ['class'=>'control-label']) !!}
            {!! Form::text('nama', null, ['class'=>'form-control']) !!}
            @if($errors->has('nama'))
                <span class="help-block">{{ $errors->first('nama') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tempat_lahir', 'Tempat Lahir', ['class'=>'control-label']) !!}
            {!! Form::text('tempat_lahir', null, ['class'=>'form-control']) !!}
            @if($errors->has('tempat_lahir'))
                <span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
            @endif
        </div>
    
    @if($errors->any())
        <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class'=>'control-label']) !!}
            {!! Form::date('tanggal_lahir', null, ['class'=>'form-control']) !!}
            @if($errors->has('tanggal_lahir'))
                <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class'=>'control-label']) !!}
            <div class="radio">
                <label>{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
            </div>
            <div class="radio">
                <label>{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
            </div>
            @if($errors->has('jenis_kelamin'))
                <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('agama') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('agama', 'Agama', ['class'=>'control-label']) !!}
            {!! Form::text('agama', null, ['class'=>'form-control']) !!}
            @if($errors->has('agama'))
                <span class="help-block">{{ $errors->first('agama') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('alamat', 'Alamat Lengkap', ['class'=>'control-label']) !!}
            {!! Form::text('alamat', null, ['class'=>'form-control']) !!}
            @if($errors->has('alamat'))
                <span class="help-block">{{ $errors->first('alamat') }}</span>
            @endif
        </div>

    @if($errors->any())
        <div class="form-group {{ $errors->has('telepon') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('telepon', 'No. Telp', ['class'=>'control-label']) !!}
            {!! Form::text('telepon', null, ['class'=>'form-control']) !!}
            @if($errors->has('telepon'))
                <span class="help-block">{{ $errors->first('telepon') }}</span>
            @endif
        </div>

    @if($errors->any())
        <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('no_hp', 'No. HP', ['class'=>'control-label']) !!}
            {!! Form::text('no_hp', null, ['class'=>'form-control']) !!}
            @if($errors->has('no_hp'))
                <span class="help-block">{{ $errors->first('no_hp') }}</span>
            @endif
        </div>

    @if($errors->any())
        <div class="form-group {{ $errors->has('tahun_lulus') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tahun_lulus', 'Tahun Lulus', ['class'=>'control-label']) !!}
            {!! Form::text('tahun_lulus', null, ['class'=>'form-control']) !!}
            @if($errors->has('tahun_lulus'))
                <span class="help-block">{{ $errors->first('tahun_lulus') }}</span>
            @endif
        </div>

    <h4><b>B. IDENTITAS SEKOLAH ASAL</b></h4>
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama_sekolah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama_sekolah', 'Nama Sekolah', ['class'=>'control-label']) !!}
            {!! Form::text('nama_sekolah', null, ['class'=>'form-control']) !!}
            @if($errors->has('nama_sekolah'))
                <span class="help-block">{{ $errors->first('nama_sekolah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('alamat_sekolah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('alamat_sekolah', 'Alamat Sekolah', ['class'=>'control-label']) !!}
            {!! Form::text('alamat_sekolah', null, ['class'=>'form-control']) !!}
            @if($errors->has('alamat_sekolah'))
                <span class="help-block">{{ $errors->first('alamat_sekolah') }}</span>
            @endif
        </div>

    <h4><b>C. IDENTITAS ORANG TUA / WALI</b></h4>
    <h4><b>1. AYAH</b></h4>
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama_ayah', 'Nama Ayah', ['class'=>'control-label']) !!}
            {!! Form::text('nama_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('nama_ayah'))
                <span class="help-block">{{ $errors->first('nama_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('tempat_lahir_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tempat_lahir_ayah', 'Tempat Lahir', ['class'=>'control-label']) !!}
            {!! Form::text('tempat_lahir_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('tempat_lahir_ayah'))
                <span class="help-block">{{ $errors->first('tempat_lahir_ayah') }}</span>
            @endif
        </div>
    
    @if($errors->any())
        <div class="form-group {{ $errors->has('tanggal_lahir_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tanggal_lahir_ayah', 'Tanggal Lahir', ['class'=>'control-label']) !!}
            {!! Form::date('tanggal_lahir_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('tanggal_lahir_ayah'))
                <span class="help-block">{{ $errors->first('tanggal_lahir_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('agama_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('agama_ayah', 'Agama', ['class'=>'control-label']) !!}
            {!! Form::text('agama_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('agama_ayah'))
                <span class="help-block">{{ $errors->first('agama_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pendidikan_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pendidikan_ayah', 'Pendidikan Terakhir', ['class'=>'control-label']) !!}
            {!! Form::text('pendidikan_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('pendidikan_ayah'))
                <span class="help-block">{{ $errors->first('pendidikan_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pekerjaan_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pekerjaan_ayah', 'Pekerjaan', ['class'=>'control-label']) !!}
            {!! Form::text('pekerjaan_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('pekerjaan_ayah'))
                <span class="help-block">{{ $errors->first('pekerjaan_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('gaji_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('gaji_ayah', 'Penghasilan', ['class'=>'control-label']) !!}
            {!! Form::text('gaji_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('gaji_ayah'))
                <span class="help-block">{{ $errors->first('gaji_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('telepon_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('telepon_ayah', 'No. Telp', ['class'=>'control-label']) !!}
            {!! Form::text('telepon_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('telepon_ayah'))
                <span class="help-block">{{ $errors->first('telepon_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('no_hp_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('no_hp_ayah', 'No. HP', ['class'=>'control-label']) !!}
            {!! Form::text('no_hp_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('no_hp_ayah'))
                <span class="help-block">{{ $errors->first('no_hp_ayah') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('alamat_ayah') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('alamat_ayah', 'Alamat', ['class'=>'control-label']) !!}
            {!! Form::text('alamat_ayah', null, ['class'=>'form-control']) !!}
            @if($errors->has('alamat_ayah'))
                <span class="help-block">{{ $errors->first('alamat_ayah') }}</span>
            @endif
        </div>
    <h4><b>2. IBU</b></h4>
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama_ibu', 'Nama Ibu', ['class'=>'control-label']) !!}
            {!! Form::text('nama_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('nama_ibu'))
                <span class="help-block">{{ $errors->first('nama_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('tempat_lahir_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tempat_lahir_ibu', 'Tempat Lahir', ['class'=>'control-label']) !!}
            {!! Form::text('tempat_lahir_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('tempat_lahir_ibu'))
                <span class="help-block">{{ $errors->first('tempat_lahir_ibu') }}</span>
            @endif
        </div>
    
    @if($errors->any())
        <div class="form-group {{ $errors->has('tanggal_lahir_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tanggal_lahir_ibu', 'Tanggal Lahir', ['class'=>'control-label']) !!}
            {!! Form::date('tanggal_lahir_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('tanggal_lahir_ibu'))
                <span class="help-block">{{ $errors->first('tanggal_lahir_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('agama_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('agama_ibu', 'Agama', ['class'=>'control-label']) !!}
            {!! Form::text('agama_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('agama_ibu'))
                <span class="help-block">{{ $errors->first('agama_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pendidikan_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pendidikan_ibu', 'Pendidikan Terakhir', ['class'=>'control-label']) !!}
            {!! Form::text('pendidikan_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('pendidikan_ibu'))
                <span class="help-block">{{ $errors->first('pendidikan_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pekerjaan_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pekerjaan_ibu', 'Pekerjaan', ['class'=>'control-label']) !!}
            {!! Form::text('pekerjaan_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('pekerjaan_ibu'))
                <span class="help-block">{{ $errors->first('pekerjaan_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('gaji_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('gaji_ibu', 'Penghasilan', ['class'=>'control-label']) !!}
            {!! Form::text('gaji_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('gaji_ibu'))
                <span class="help-block">{{ $errors->first('gaji_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('telepon_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('telepon_ibu', 'No. Telp', ['class'=>'control-label']) !!}
            {!! Form::text('telepon_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('telepon_ibu'))
                <span class="help-block">{{ $errors->first('telepon_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('no_hp_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('no_hp_ibu', 'No. HP', ['class'=>'control-label']) !!}
            {!! Form::text('no_hp_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('no_hp_ibu'))
                <span class="help-block">{{ $errors->first('no_hp_ibu') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('alamat_ibu') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('alamat_ibu', 'Alamat', ['class'=>'control-label']) !!}
            {!! Form::text('alamat_ibu', null, ['class'=>'form-control']) !!}
            @if($errors->has('alamat_ibu'))
                <span class="help-block">{{ $errors->first('alamat_ibu') }}</span>
            @endif
        </div>

    <h4><b>3. WALI</b></h4>
    @if($errors->any())
        <div class="form-group {{ $errors->has('nama_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('nama_wali', 'Nama Wali', ['class'=>'control-label']) !!}
            {!! Form::text('nama_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('nama_wali'))
                <span class="help-block">{{ $errors->first('nama_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('tempat_lahir_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tempat_lahir_wali', 'Tempat Lahir', ['class'=>'control-label']) !!}
            {!! Form::text('tempat_lahir_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('tempat_lahir_wali'))
                <span class="help-block">{{ $errors->first('tempat_lahir_wali') }}</span>
            @endif
        </div>
    
    @if($errors->any())
        <div class="form-group {{ $errors->has('tanggal_lahir_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('tanggal_lahir_wali', 'Tanggal Lahir', ['class'=>'control-label']) !!}
            {!! Form::date('tanggal_lahir_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('tanggal_lahir_wali'))
                <span class="help-block">{{ $errors->first('tanggal_lahir_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('agama_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('agama_wali', 'Agama', ['class'=>'control-label']) !!}
            {!! Form::text('agama_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('agama_wali'))
                <span class="help-block">{{ $errors->first('agama_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pendidikan_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pendidikan_wali', 'Pendidikan Terakhir', ['class'=>'control-label']) !!}
            {!! Form::text('pendidikan_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('pendidikan_wali'))
                <span class="help-block">{{ $errors->first('pendidikan_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('pekerjaan_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('pekerjaan_wali', 'Pekerjaan', ['class'=>'control-label']) !!}
            {!! Form::text('pekerjaan_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('pekerjaan_wali'))
                <span class="help-block">{{ $errors->first('pekerjaan_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('gaji_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('gaji_wali', 'Penghasilan', ['class'=>'control-label']) !!}
            {!! Form::text('gaji_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('gaji_wali'))
                <span class="help-block">{{ $errors->first('gaji_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('telepon_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('telepon_wali', 'No. Telp', ['class'=>'control-label']) !!}
            {!! Form::text('telepon_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('telepon_wali'))
                <span class="help-block">{{ $errors->first('telepon_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('no_hp_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('no_hp_wali', 'No. HP', ['class'=>'control-label']) !!}
            {!! Form::text('no_hp_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('no_hp_wali'))
                <span class="help-block">{{ $errors->first('no_hp_wali') }}</span>
            @endif
        </div>
    @if($errors->any())
        <div class="form-group {{ $errors->has('alamat_wali') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
            {!! Form::label('alamat_wali', 'Alamat', ['class'=>'control-label']) !!}
            {!! Form::text('alamat_wali', null, ['class'=>'form-control']) !!}
            @if($errors->has('alamat_wali'))
                <span class="help-block">{{ $errors->first('alamat_wali') }}</span>
            @endif
        </div>

    <div class="form-group">
        <div class="col-md-3 col-md-offset-4">
            {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>