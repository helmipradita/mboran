@extends('layouts.backend')

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Kecamatan</h1>
        </div>
        <div class="">
            <form action="/kecamatan/update/{{ $kecamatan->id_kecamatan }}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label" for="name">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{ old('kecamatan') ?? $kecamatan->kecamatan }}">
                    @error('kecamatan')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="geojson" class="form-label">GeoJSON</label>
                    <textarea class="form-control" name="geojson" id="geojson" rows="3">{{ old('geojson') ?? $kecamatan->geojson }}</textarea>
                    @error('geojson')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="warna">Warna</label>
                    <input type="text" name="warna" id="warna" class="form-control" value="{{ old('warna') ?? $kecamatan->warna }}">
                    @error('warna')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                <a class="text-danger mx-3" href="{{ route('kecamatan.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection