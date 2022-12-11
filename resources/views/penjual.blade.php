@extends('layouts.frontend')

@section('content')
    <div >
        <a href="{{ url()->previous() }}" class="text-decoration-none">
            <span data-feather="arrow-left"></span>
                Kembali
        </a>
    </div>
    <h1>Halaman List Penjual Nasi Boranan</h1>    

    <div class="row mt-4" style="margin-bottom: 60px">
        <div class="col-md-8">
            <div id="map" style="width: 100%; height: 400px;"></div>
        </div>

        <div class="col-4">
            <h5>Filter Kecamatan:</h5>
            <hr>
            @foreach ($kecamatan as $data)
                <li><a href="/kecamatan/{{ $data->id_kecamatan }}" class="text-decoration-none">{{ $data->kecamatan }}</a></li>
            @endforeach
        </div>

        <div class="col-md-12">
            <div class="table-responsive mt-4">
                <h5>List Penjual:</h5>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama penjual</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Posisi</th>
                            <th>Opsi</th>
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
                                <td>
                                    <a href="/detailpenjual/{{ $data->id_penjual }}" class="btn btn-info">Cek</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
            
        @foreach ($kecamatan as $data)
            var data{{ $data->id_kecamatan }} = L.layerGroup(); 
        @endforeach
        
        var map = L.map('map', {
            center: [-7.119203378119474, 112.41418232082489],
            zoom: 14,
            layers: [peta1, 
            @foreach ($kecamatan as $data)
                data{{ $data->id_kecamatan }},
            @endforeach
        ]
        });
        var baseMaps = {
            "Graysalce": peta1,
            "Satelite": peta2,
            "Street": peta3,
            "Dark": peta4,
        };
        var overLayer = {
            @foreach ($kecamatan as $data)
                "{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
            @endforeach
        };
        L.control.layers(baseMaps, overLayer).addTo(map);

        @foreach($kecamatan as $data)
            L.geoJSON({!! $data->geojson !!}, {
                style: {
                    color: 'black',
                    fillColor: '{{ $data->warna }}',
                    fillOpacity: 0.5,
                },
            }).addTo( data{{ $data->id_kecamatan }});
        @endforeach
        @foreach($penjual as $data)
        var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset('storage/'. $data->foto) }}" width="250px"></td></tr><tbody><tr><td>Nama penjual</td><td style="text-bold"><span style="font-weight:bold">{{ $data->name }}</span></td></tr><tr><td>Kecamatan</td><td><span style="font-weight:bold">{{ $data->kecamatan }}</span></td></tr><tr><td colspan="2" class="text-center text-black"><a href="/detailpenjual/{{ $data->id_penjual }}" class="btn btn-outline-secondary btn-sm">Detail</td></tr></tbody></table>';
        
            L.marker([{!! $data->posisi !!}])
            .addTo(map)
            .bindPopup(informasi);
        @endforeach
    </script>
@endsection