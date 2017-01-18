@extends('layouts.peserta')

@section('content')
<div class="container">
    <div class="jumbotron" style="opacity:0.8;">
        <p class="h1">Selamat Datang!</p>
        <p>Halo, <strong> {{ Auth::user()->name }}</strong>.</p>
        <p>Jika Anda belum melengkapi biodata, silakan melengkapinya. Klik tombol "<strong>Biodata</strong>" di bawah ini!</p>
        <p>{{ link_to('/biodata/create','Biodata',['class'=>'btn btn-primary btn-lg']) }}</p>
    </div>
</div>
@endsection
