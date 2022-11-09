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
  </style>
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">&#128075; Halo, {{ auth()->user()->name }} </h1>
    </div>

  </div><br><br>

@endsection