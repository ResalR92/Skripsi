<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Data Calon Peserta Didik</title>
    <style type="text/css">
        h1 {text-align:center; font-size:18px;}
        h2 {font-size:14px;}
        .tengah {text-align:center;	}
        .kiri {padding-left:10px;}
        table.nilai {border-collapse: collapse;}
        table.nilai td {border: 1px solid #000000}
    </style>
</head>

<body>
<h1>DATA CALON PESERTA DIDIK</h1>
<hr />
<table width="500" border="0">
    <tr>
        <td>No. Pendaftaran </td>
        <td>: {{ $peserta->id }}</td>
        <td rowspan="3">
            {!! Html::image(asset('fotoupload/'.$peserta->foto),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
        </td>
    </tr>
    <tr>
        <td>Program Keahlian </td>
        <td>: {{ $peserta->jurusan->nama }}</td>
    </tr>
    <tr>
        <td colspan="2"><h2>A. IDENTITAS PRIBADI CALON SISWA</h2></td>
    </tr>
    <tr>
        <td>1. Nama Lengkap </td>
        <td>: {{ $peserta->nama }}</td>
    </tr>
    <tr>
        <td>2. Tempat Tanggal Lahir </td>
        <td>: {{ $peserta->tempat_lahir }}, {{ $peserta->tanggal_lahir }}</td>
    </tr>
    <tr>
        <td>3. Jenis Kelamin </td>
        <td>: {{ $peserta->jenis_kelamin }}</td>
    </tr>
    <tr>
        <td>4. Agama </td>
        <td>: {{ $peserta->agama }}</td>
    </tr>
    <tr>
        <td>5. Alamat Lengkap </td>
        <td>: {{ $peserta->alamat }}</td>
    </tr>
    <tr>
        <td>6. No. Telp / HP</td>
        <td>: {{ $peserta->telepon }} / {{ $peserta->no_hp }}</td>
    </tr>
    <tr>
        <td>7. Tahun Lulus </td>
        <td>: {{ $peserta->tahun_lulus }}</td>
    </tr>
    <tr>
        <td colspan="2"><h2>B. IDENTITAS SEKOLAH ASAL</h2></td>
    </tr>
    <tr>
        <td>1. Nama Sekolah</td>
        <td>: {{ $peserta->sekolah->nama }}</td>
    </tr>
    <tr>
        <td>2. Alamat Sekolah</td>
        <td>: {{ $peserta->sekolah->alamat }}</td>
    </tr>
    <tr>
        <td colspan="2"><h2>C. IDENTITAS ORANG TUA / WALI</h2></td>
    </tr>
    <tr>
        <td>Nama Ayah</td>
        <td>: {{ $peserta->ayah->nama }}</td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td>: {{ $peserta->ayah->tempat_lahir }}, {{ $peserta->ayah->tanggal_lahir }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ $peserta->ayah->agama }}</td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir</td>
        <td>: {{ $peserta->ayah->pendidikan }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $peserta->ayah->pekerjaan }}</td>
    </tr>
    <tr>
        <td>Penghasilan</td>
        <td>: {{ $peserta->ayah->gaji }}</td>
    </tr>
    <tr>
        <td>No. Telp / HP</td>
        <td>: {{ $peserta->ayah->telepon }} / {{ $peserta->ayah->no_hp }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $peserta->ayah->alamat }}</td>
    </tr>
</table>
<p>&nbsp;</p>
<table width="500" border="0">
    <tr>
        <td>Nama Ibu</td>
        <td>: {{ $peserta->ibu->nama }}</td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td>: {{ $peserta->ibu->tempat_lahir }}, {{ $peserta->ibu->tanggal_lahir }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ $peserta->ibu->agama }}</td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir</td>
        <td>: {{ $peserta->ibu->pendidikan }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $peserta->ibu->pekerjaan }}</td>
    </tr>
    <tr>
        <td>Penghasilan</td>
        <td>: {{ $peserta->ibu->gaji }}</td>
    </tr>
    <tr>
        <td>No. Telp / HP</td>
        <td>: {{ $peserta->ibu->telepon }} / {{ $peserta->ibu->no_hp }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $peserta->ibu->alamat }}</td>
    </tr>
</table>
<p>&nbsp;</p>
<br>
<br>
<table width="500" border="0">
     <tr>
        <td>Nama Wali</td>
        <td>: {{ $peserta->wali->nama }}</td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td>: {{ $peserta->wali->tempat_lahir }}, {{ $peserta->wali->tanggal_lahir }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ $peserta->wali->agama }}</td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir</td>
        <td>: {{ $peserta->wali->pendidikan }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $peserta->wali->pekerjaan }}</td>
    </tr>
    <tr>
        <td>Penghasilan</td>
        <td>: {{ $peserta->wali->gaji }}</td>
    </tr>
    <tr>
        <td>No. Telp / HP</td>
        <td>: {{ $peserta->wali->telepon }} / {{ $peserta->wali->no_hp }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $peserta->wali->alamat }}</td>
    </tr>   
</table>
<p>&nbsp;</p>
<table width="500" border="0">
    <tr>
        <td colspan="2"><h2>3. PERSYARATAN PENGEMBALIAN FORMULIR</h2></td>
    </tr>
    <tr>
        <td>1. Foto copy Ijazah, SKHUN (Legalisir) dan Akte Lahir (@ 3 Lembar)
    </tr>
    <tr>
        <td>2. Foto copy Rapor SMP/Sederajat dari Semester I sampai V
    </tr>
    <tr>
        <td>3. Foto copy KTP orang tua dan Kartu Keluarga
    </tr>
    <tr>
        <td>4. Foto copy NISN, 2 Lembar
    </tr>
    <tr>
        <td colspan="2">5. Pas Photo terbaru ukuran 3x4 (berwarna, 3 lembar), ukuran 2x3 (berwarna, 2 lembar)
    </tr>
</table>
<p>&nbsp;</p>
<table width="600" border="0">
    <tr>
        <td width="200">
            Mengetahui<br>
            Orang Tua/Wali Murid,
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            @if(isset($peserta->wali->nama))
                <u>{{ $peserta->wali->nama }}</u>
            @else()
                <u>{{ $peserta->ayah->nama }}</u>
            @endif
            
        </td>
        <td width="200">&nbsp;</td>
        <td width="200"><br />
            Bekasi, {{ date('d-m-Y') }} <br>
            <br>
            <br>
            <br> 
            <br>
            <br>
            <u>{{ $peserta->nama }}</u>
        </td>
    </tr>
</table>
</body>
</html>