@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>LOGO MBORAN</h1>
        </div>

        <div class="col-md-5">
            <h3>Belum Ke Lamongan Kalau Belum Makan Nasi Boranan</h3>
        </div>

        <div class="col-md-4">
            <a href="/login" class="btn btn-secondary">Masuk</a>
            <a href="/register" class="btn btn-secondary">Daftar</a>
        </div>
        
        <br>
        <div class="col-md-4">
            <a href="/sejarah" class="btn btn-primary">Kenali Nasi Boranan</a>
        </div>

        <div class="col-4">
            <h5>Filter Toko berdasarkan Kecamatan:</h5>
            <hr>
            @foreach ($kecamatan as $data)
                <li><a href="/kecamatan/{{ $data->id_kecamatan }}" class="text-decoration-none">{{ $data->kecamatan }}</a></li>
            @endforeach
        </div>
    </div>
@endsection