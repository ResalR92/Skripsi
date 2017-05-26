<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Data Calon Peserta Didik</title>
    <style type="text/css">
        body{
            margin-left: 30px;
        }
        h1 {text-align:center; font-size:18px;}
        h2 {font-size:14px;}
        .tengah {text-align:center;	}
        .kiri {padding-left:10px;}
        table.nilai {border-collapse: collapse;}
        table.nilai td {border: 1px solid #000000}
    </style>
</head>

<body>
<table width="500" border="0">
    <tr>
        <td width="100">
            {!! Html::image(asset('images/logo.png'),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
        </td>
        <td>
            <p style="text-align:center;font-size:25px;margin-bottom:0;margin-top:0;"><b>SEKOLAH MENENGAH KEJURUAN</b></p>
            <p style="text-align:center;font-size:35px;margin-bottom:0;margin-top:0;"><b>SMK PANJATEK</b></p>
            <hr style="margin-bottom:0;">
            <p style="text-align:center;margin-top:0;margin-bottom:0;">
                <i>Teknik Kendaraan Ringan (TKR), Teknik Permesinan (TP),</i>
            </p>
            <p style="text-align:center;margin-top:0;">
                <i>Teknik Komputer Jaringan (TKJ), Administrasi Perkantoran (AP)</i>
            </p>
        </td>
    </tr>
</table>

<h1 style="margin-bottom:0;margin-top:0;">FORMULIR PENDAFTARAN CALON PESERTA DIDIK BARU</h1>
<h1 style="margin-top:0;">TAHUN AJARAN {{ date('Y')  }}/{{ date('Y') + 1 }}</h1>

<table width="500" border="0">
    <tr>
        <td>No. Pendaftaran </td>
        <td>: <b>{{ $peserta->id }}</b></td>
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
        <td>: <b>{{ $peserta->nama }}</b></td>
    </tr>
    <tr>
        <td>2. Tempat Tanggal Lahir </td>
        <td>: {{ $peserta->tempat_lahir }}, {{ $peserta->tanggal_lahir->formatLocalized('%d %B %Y') }}</td>
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
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
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
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
        <td colspan="2"><h2>C. IDENTITAS ORANG TUA / WALI</h2></td>
    </tr>
    <tr>
        <td>Nama Ayah</td>
        <td>: {{ $peserta->ayah->nama }}</td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td>: {{ $peserta->ayah->tempat_lahir }}, {{ $peserta->ayah->tanggal_lahir->formatLocalized('%d %B %Y') }}</td>
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
        <td>: {{ (!empty($peserta->ayah->gaji)) ? sprintf('Rp %s', number_format($peserta->ayah->gaji, 2))  : '-' }}</td>
    </tr>
    <tr>
        <td>No. Telp / HP</td>
        <td>: {{ $peserta->ayah->telepon }} / {{ $peserta->ayah->no_hp }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $peserta->ayah->alamat }}</td>
    </tr>

    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
        <td>Nama Ibu</td>
        <td>: {{ $peserta->ibu->nama }}</td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td>: {{ $peserta->ibu->tempat_lahir }}, {{ $peserta->ibu->tanggal_lahir->formatLocalized('%d %B %Y') }}</td>
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
        <td>: {{ (!empty($peserta->ibu->gaji)) ? sprintf('Rp %s', number_format($peserta->ibu->gaji, 2))  : '-' }}</td>
    </tr>
    <tr>
        <td>No. Telp / HP</td>
        <td>: {{ $peserta->ibu->telepon }} / {{ $peserta->ibu->no_hp }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $peserta->ibu->alamat }}</td>
    </tr>
    <hr style="visibility:hidden;">
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    

    <p style="margin-bottom:0;margin-top:0;text-align:center;">
        <b>___________________________________________________________________________________</b>
        <br>Jln. Lingkar Utara No.99 Harapan Baru - Bekasi Utara Kota Bekasi 17123
        <br>Telp. 021-889981110 (hunting), Fax. 021-88981113, E-mail : admin@smkpanjatek.com
    </p>
        
</table>

<table width="500" border="0">
    <tr>
        <td width="100">
            {!! Html::image(asset('images/logo.png'),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
        </td>
        <td>
            <p style="text-align:center;font-size:25px;margin-bottom:0;margin-top:0;"><b>SEKOLAH MENENGAH KEJURUAN</b></p>
            <p style="text-align:center;font-size:35px;margin-bottom:0;margin-top:0;"><b>SMK PANJATEK</b></p>
            <hr style="margin-bottom:0;">
            <p style="text-align:center;margin-top:0;margin-bottom:0;">
                <i>Teknik Kendaraan Ringan (TKR), Teknik Permesinan (TP),</i>
            </p>
            <p style="text-align:center;margin-top:0;">
                <i>Teknik Komputer Jaringan (TKJ), Administrasi Perkantoran (AP)</i>
            </p>
        </td>
    </tr>
</table>

<table width="500" border="0">
     <tr>
        <td width="150">Nama Wali</td>
        <td>: {{ (!empty($peserta->wali->nama)) ? $peserta->wali->nama : '-' }}</td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td>: {{ (!empty($peserta->wali->tempat_lahir)) ? $peserta->wali->tempat_lahir : '-' }}, {{ (!empty($peserta->wali->tanggal_lahir)) ? $peserta->wali->tanggal_lahir->formatLocalized('%d %B %Y') : '-' }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ (!empty($peserta->wali->agama)) ? $peserta->wali->agama : '-' }}</td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir</td>
        <td>: {{ (!empty($peserta->wali->pendidikan)) ? $peserta->wali->pendidikan : '-' }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ (!empty($peserta->wali->pekerjaan)) ? $peserta->wali->pekerjaan : '-' }}</td>
    </tr>
    <tr>
        <td>Penghasilan</td>
        <td>: {{ (!empty($peserta->wali->gaji)) ? sprintf('Rp %s', number_format($peserta->wali->gaji, 2))  : '-' }}</td>
    </tr>
    <tr>
        <td>No. Telp / HP</td>
        <td>: {{ (!empty($peserta->wali->telepon)) ? $peserta->wali->telepon : '-' }} / {{ (!empty($peserta->wali->no_hp)) ? $peserta->wali->no_hp : '-' }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td colspan="2">: {{ (!empty($peserta->wali->alamat)) ? $peserta->wali->alamat : '-' }}</td>
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
            @if(!empty($peserta->wali->nama))
                <u>{{ $peserta->wali->nama }}</u>
                <br><b>Nb, Rekomendasi:</b>
            @else
                _________________
                <br><b>Nb, Rekomendasi:</b>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table width="600" border="0">
<hr style="visibility:hidden;">
<tr><td></td></tr>
    <tr><td></td></tr>
<p style="margin-bottom:0;margin-top:0;text-align:center;">
    <b>___________________________________________________________________________________</b>
    <br>Jln. Lingkar Utara No.99 Harapan Baru - Bekasi Utara Kota Bekasi 17123
    <br>Telp. 021-889981110 (hunting), Fax. 021-88981113, E-mail : admin@smkpanjatek.com
</p>
</table>
</body>
</html>