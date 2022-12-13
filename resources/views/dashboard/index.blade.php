@extends('layouts.backend')

@section('content')
  <style>
    .feather-30{
        width: 30px;
        height: 30px;
    }
    .tool-30{
        width: 30px;
        height: 30px;
    }
    body {
      background-color: black
    }
  </style>

  <div class="text-white">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    

  <div class="table-responsive">
    <div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat datang di website mboran</h1>
      </div>
    </div>

    @foreach($penjual as $index => $data)
      @if(!$penjual->isEmpty())
          {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">Edit Data Penjual</h1>
          </div>
          <td>{{ $index + 1 }}</td>
          <td>{{ $data->nama_penjual }}</td>
          <td>{{ $data->kecamatan }}</td>
          <td>
              <a href="/detailpenjual/{{ $data->id_penjual }}" class="btn btn-info">View</a>
              @role('admin')
                <a href="dashboard/penjual/edit/{{ $data->id_penjual }}" class="btn btn-primary">Edit</a>
              @endrole
              
          </td> --}}
      @else
        <div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Selamat datang di website mboran</h1>
          </div>
        </div>
      @endif
          
  @endforeach
  </div>


@endsection