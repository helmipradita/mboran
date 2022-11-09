<div class="mb-3">
    <label class="form-label" for="name">Kecamatan</label>
    <input type="text" name="kecamatan" id="kecamatan" class="form-control">
    @error('kecamatan')
        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
    @enderror
</div>
<div class="mb-3">
    <label for="geojson" class="form-label">GeoJSON</label>
    <textarea class="form-control" name="geojson" id="geojson" rows="3"></textarea>
    @error('geojson')
        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="warna">Warna</label>
    <input type="text" name="warna" id="warna" class="form-control" >
    @error('warna')
        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>