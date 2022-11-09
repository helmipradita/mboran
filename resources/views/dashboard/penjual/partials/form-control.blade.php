<div class="row">
    <div class="mb-3 col-md-4">
        <label class="form-label" for="nama_penjual">Nama penjual</label>
        <input type="text" name="nama_penjual" id="nama_penjual" class="form-control" required>
        @error('nama_penjual')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
        @enderror
    </div>
    <div class="mb-3 col-md-4">
        <label for="id_kecamatan" class="form-label">Kecamatan</label>
        <select name="id_kecamatan" id="id_kecamatan" class="form-control">
            <option value="" >Pilih Kecamatan</option>
            @foreach ($kecamatan as $data)
                <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
            @endforeach
        </select>
        @error('id_kecamatan')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
        @enderror
    </div>
    <div class="mb-3 col-md-4">
        <label class="form-label" for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control" accept="image/jpeg,image/png">
        @error('foto')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="2"></textarea>
        @error('alamat')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="2"></textarea>
        @error('deskripsi')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label" for="posisi">Posisi</label>
        <input type="text" name="posisi" id="posisi" class="form-control" readonly>
        @error('posisi')
            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="map" class="form-label">Map</label>
    <div id="map" style="width: 100%; height: 300px;"></div>
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>


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
        center: [-7.470978040905679, 112.44103322529277],
        zoom: 14,
        layers: [peta1],
    });

    var baseMaps = {
        "Graysalce": peta1,
        "Satelite": peta2,
        "Street": peta3,
        "Dark": peta4,
    };

    L.control.layers(baseMaps).addTo(map);

    //Get titik koordinat
    var curLocation = [-7.470978040905679, 112.44103322529277];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation,{
        draggable : 'true',
    });
    map.addLayer(marker);

    //Get koordinat saat marker di drag n drop
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true',
        }).bindPopup(position).update();
        $("#posisi").val(position.lat + "," + position.lng).keyup();
    });

    //Get koordinat saat map diklik
    var posisi = document.querySelector("[name=posisi");
    map.on("click", function(event){
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;

        if (!marker) {
            marker = L.marker(event.latlng).addTo(map);
        }else{
            marker.setLatLng(event.latlng);
        }
        posisi.value = lat + "," + lng;
    });

</script>