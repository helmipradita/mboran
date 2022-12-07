@extends('layouts.frontend')

@section('content')
<style>
    body {
      background-color: black
    }
  </style>
  

<div class="full">
    <div class="container">
        <div class="text-center">
            <img src="{{URL::asset('/img/mboranLogo 2.png')}}" alt="">
            <h3 class="text-light">Berikan penilaian Kepada Penjual</h3><br><br>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <a href="https://bit.ly/FormNasiBoran" class="btn btn-secondary btn-lg btn-block  rounded-pill">bit.ly/FormNasiBoran</a><br><br>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 offset-5">
        <a href="/" class="btn btn-primary"  >Kembali ke Beranda</a>
    </div>
</div>
@endsection