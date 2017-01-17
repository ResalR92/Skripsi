@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Biodata Peserta   
		        	<small>Status</small>
					{{ link_to('admin/peserta/status/'.$peserta->id.'/edit',$peserta->status->nama,['class'=>'btn btn-'.$peserta->status->label]) }}
		        </h1>
		        @include('_partial.flash_message')
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li class="active">
		                Biodata Peserta
		            </li>
		        </ol>
		    </div>
		</div>
		<div class="jumbotron bio-preview">
			<h2 class="bg-info">DATA CALON PESERTA DIDIK</h2>
			<hr>
			<div class="row">
				<div class="col-md-8">
					<dl class="dl-horizontal">
						<dt>No. Pendaftaran</dt>
						<dd>: {{ $peserta->id }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Program Keahlian</dt>
						<dd>: {{ $peserta->jurusan->nama }}</dd>
					</dl>
				</div>
				<div class="col-md-4">
					{!! Html::image(asset('fotoupload/'.$peserta->foto),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
				</div>
			</div>
			<h3 class="bg-info">A. IDENTITAS PRIBADI CALON peserta</h3>
		    <dl class="dl-horizontal">
		        <dt>1. Nomor Peserta</dt>
		        <dd>: {{ $peserta->nama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>2. Tempat Tanggal Lahir</dt>
		        <dd>: {{ $peserta->tempat_lahir }}, {{ $peserta->tanggal_lahir }}</dd>
		    </dl>
			<dl class="dl-horizontal">
		        <dt>3. Jenis Kelamin</dt>
		        <dd>: {{ $peserta->jenis_kelamin }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>4. Agama</dt>
		        <dd>: {{ $peserta->agama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>5. Alamat Lengkap</dt>
		        <dd>: {{ $peserta->alamat }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>6. No. Telp / HP</dt>
		        <dd>: {{ $peserta->telepon }} / {{ $peserta->no_hp }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>7. Tahun Lulus</dt>
		        <dd>: {{ $peserta->tahun_lulus }}</dd>
		    </dl>

		    <h3 class="bg-info">B. IDENTITAS SEKOLAH ASAL</h3>
			<dl class="dl-horizontal">
		        <dt>1. Nama Sekolah</dt>
		        <dd>: {{ $peserta->sekolah->nama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>2. Alamat Sekolah</dt>
		        <dd>: {{ $peserta->sekolah->alamat }}</dd>
		    </dl>

			<h3 class="bg-info">C. IDENTITAS ORANG TUA / WALI</h3>
			<h4><b>1. AYAH</b></h4>
			<dl class="dl-horizontal">
		        <dt>Nama</dt>
		        <dd>: {{ $peserta->ayah->nama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Tempat Tanggal Lahir</dt>
		        <dd>: {{ $peserta->ayah->tempat_lahir }}, {{ $peserta->ayah->tanggal_lahir }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Agama</dt>
		        <dd>: {{ $peserta->ayah->agama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Pendidikan Terakhir</dt>
		        <dd>: {{ $peserta->ayah->pendidikan }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Pekerjaan</dt>
		        <dd>: {{ $peserta->ayah->pekerjaan }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Penghasilan</dt>
		        <dd>: Rp {{ $peserta->ayah->gaji }},00</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>No. Telp / HP</dt>
		        <dd>: {{ $peserta->ayah->telepon }} / {{ $peserta->ayah->no_hp }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Alamat</dt>
		        <dd>: {{ $peserta->ayah->alamat }}</dd>
		    </dl>
		    <h4><b>2. IBU</b></h4>
			<dl class="dl-horizontal">
		        <dt>Nama</dt>
		        <dd>: {{ $peserta->ibu->nama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Tempat Tanggal Lahir</dt>
		        <dd>: {{ $peserta->ibu->tempat_lahir }}, {{ $peserta->ibu->tanggal_lahir }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Agama</dt>
		        <dd>: {{ $peserta->ibu->agama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Pendidikan Terakhir</dt>
		        <dd>: {{ $peserta->ibu->pendidikan }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Pekerjaan</dt>
		        <dd>: {{ $peserta->ibu->pekerjaan }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Penghasilan</dt>
		        <dd>: Rp {{ $peserta->ibu->gaji }},00</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>No. Telp / HP</dt>
		        <dd>: {{ $peserta->ibu->telepon }} / {{ $peserta->ibu->no_hp }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Alamat</dt>
		        <dd>: {{ $peserta->ibu->alamat }}</dd>
		    </dl>
		    <h4><b>3. WALI</b></h4>
			<dl class="dl-horizontal">
		        <dt>Nama</dt>
		        <dd>: {{ $peserta->wali->nama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Tempat Tanggal Lahir</dt>
		        <dd>: {{ $peserta->wali->tempat_lahir }}, {{ $peserta->wali->tanggal_lahir }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Agama</dt>
		        <dd>: {{ $peserta->wali->agama }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Pendidikan Terakhir</dt>
		        <dd>: {{ $peserta->wali->pendidikan }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Pekerjaan</dt>
		        <dd>: {{ $peserta->wali->pekerjaan }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Penghasilan</dt>
		        <dd>: Rp {{ $peserta->wali->gaji }},00</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>No. Telp / HP</dt>
		        <dd>: {{ $peserta->wali->telepon }} / {{ $peserta->wali->no_hp }}</dd>
		    </dl>
		    <dl class="dl-horizontal">
		        <dt>Alamat</dt>
		        <dd>: {{ $peserta->wali->alamat }}</dd>
		    </dl>
		</div> <!-- jumbotron end -->
		{{ link_to('admin/peserta/'.$peserta->id.'/pdf','Cetak',['class'=>'btn btn-success']) }}
	</div>
@stop