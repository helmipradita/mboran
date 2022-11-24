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
    
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah penjual</h1>
        </div>
        <div class="">
            <form action="{{ route('penjual.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.penjual.partials.form-control', ['submit' => 'Tambah'])
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List penjual</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama penjual</th>
                    <th>Kecamatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penjual as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nama_penjual }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        <td>
                            <a href="penjual/edit/{{ $data->id_penjual }}" class="btn btn-primary">Edit</a>
                            <a href="penjual/delete/{{ $data->id_penjual }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection