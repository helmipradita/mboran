@extends('layouts.frontend')

@section('content')
    <div >
        <a href="{{ url()->previous() }}" class="text-decoration-none">
            <span data-feather="arrow-left"></span>
                Kembali
        </a>
    </div>
    <h1>Halaman Kecamatan: {{ $kec->kecamatan }}</h1>    

    <div id="map" style="width: 100%; height: 400px;"></div>
<br>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama penjual</th>
                    <th>Kecamatan</th>
                    <th>Alamat</th>
                    <th>Posisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penjual as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->posisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            var data{{ $kec->id_kecamatan }} = L.layerGroup(); 
        
        var map = L.map('map', {
            center: [-7.470978040905679, 112.44103322529277],
            zoom: 14,
            layers: [peta1, data{{ $kec->id_kecamatan }}]
        });
        var baseMaps = {
            "Graysalce": peta1,
            "Satelite": peta2,
            "Street": peta3,
            "Dark": peta4,
        };
        var overLayer = {
            "{{ $kec->kecamatan }}" : data{{ $kec->id_kecamatan }},
        };
        L.control.layers(baseMaps, overLayer).addTo(map);
        
        var kec = L.geoJSON({!! $kec->geojson !!}, {
            style: {
                color: 'black',
                fillColor: '{{ $kec->warna }}',
                fillOpacity: 0.5,
            },
        }).addTo( data{{ $kec->id_kecamatan }});
        map.fitBounds(kec.getBounds());
        @foreach($penjual as $data)
            var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset('storage/'. $data->foto) }}" width="250px"></td></tr><tbody><tr><td>Nama penjual</td><td style="text-bold"><span style="font-weight:bold">{{ $data->name }}</span></td></tr><tr><td>Kecamatan</td><td><span style="font-weight:bold">{{ $data->kecamatan }}</span></td></tr><tr><td colspan="2" class="text-center text-black"><a href="/detailpenjual/{{ $data->id_penjual }}" class="btn btn-outline-secondary btn-sm">Detail</td></tr></tbody></table>';
        
            L.marker([{!! $data->posisi !!}])
            .addTo(map)
            .bindPopup(informasi);
        @endforeach
    </script>
@endsection