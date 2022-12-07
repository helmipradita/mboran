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

    ini dashboard


  </div>

@endsection