@extends('layouts.frontend')

@section('content')
<div >
    <a href="{{ URL::previous() }}" class="text-decoration-none">
        <span data-feather="arrow-left"></span>
            Kembali
    </a>
</div>
    <h1>Halaman Detail penjual: <b>{{ $penjual->name }}</b></h1>    

    <div class="row">
        <div class="col-md-6">
            <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('storage/'. $penjual->foto) }}" width="400px">
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 mt-3">
            <h5>Nama penjual:</h5>{{ $penjual->name }}
        </div>
        <div class="col-md-4 mt-3">
            <h5>Kecamatan: </h5>{{ $penjual->kecamatan }}
        </div>
        <div class="col-md-4 mt-3">
            <h5>Deskirpsi: </h5>{!! $penjual->deskripsi !!}
        </div>
        <div class="col-md-4 mt-3">
            <h5>Alamat:</h5>{{ $penjual->alamat }}
        </div>
        <div class="col-md-4 mt-3">
            <h5>Maps: </h5>
            Buka di maps untuk melihat rute: <a href="https://www.google.com/maps/place/{{ $penjual->posisi }}">cek</a>
        </div>
        <div class="col-md-4 my-3">
            <a href="" class="btn btn-light btn-lg btn-block rounded-lg disabled">{{ $penjual->ranting }}</a><br><br>
        </div>
        <div class="col-md-4 my-3">
            <a href="{{route('penilaian')}}" class="btn btn-light btn-lg btn-block rounded-lg">Berikan Penilaian</a><br><br>
        </div>
    </div>

    <script>
        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });
    
        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });
    
    
        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
    
        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });
    
        var map = L.map('map', {
            center: [{{ $penjual->posisi }}],
            zoom: 16,
            layers: [peta1],
        });
    
        var baseMaps = {
            "Graysalce": peta1,
            "Satelite": peta2,
            "Street": peta3,
            "Dark": peta4,
        };
    
        L.control.layers(baseMaps).addTo(map);
    
        L.marker([{!! $penjual->posisi !!}])
        .addTo(map)
    
    </script>
@endsection