@extends('layouts.backend')

@section('content')
    <div class="mt-2">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tambah Kecamatan</h1>
                </div>
                <div class="">
                    <form action="{{ route('kecamatan.create') }}" method="post">
                        @csrf
                        @include('dashboard.kecamatan.partials.form-control', ['submit' => 'Tambah'])
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">List Kecamatan</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
                            <th>Warna</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kecamatan as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->kecamatan }}</td>
                                <td style="background-color: {{ $data->warna }}"></td>
                                <td>
                                    <a href="kecamatan/edit/{{ $data->id_kecamatan }}" class="btn btn-primary">Edit</a>
                                    
                                    <a href="kecamatan/delete/{{ $data->id_kecamatan }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

    </script> --}}
@endsection