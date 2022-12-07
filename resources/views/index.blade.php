@extends('layouts.frontend')

@section('content')
<style>
    body {
      background-color: black
    }
  </style>
        <div class="text-center">
            <img src="{{URL::asset('/img/mboranLogo 2.png')}}" alt="">
        </div>

        <div class="row">
            <div class="col-md-6">
                <img src="{{URL::asset('/img/nasi_boranan.png')}}" alt="" style="width: 600px; margin-left:630px">
            </div>
            <div class="" style="align-items: center">
                <h3 class="text-white" style="margin-right:850px; margin-top:-320px; margin-bottom:30px; text-align: center; font-size: 30px">Belum Ke Lamongan Kalau Belum Makan Nasi Boranan</h3>

                @guest
                <div class="col-md-4" style="margin-left: 30px">
                    <a href="/login" class="btn btn-secondary">Masuk</a>
                    <a href="/register" class="btn btn-secondary">Daftar</a>
                </div>
                <br>
                <div class="col-md-4" style="margin-left: 20px">
                    <a href="/sejarah" class="btn btn-primary">Kenali Nasi Boranan</a>
                </div>

                @else
                <div class="col-md-4" style="margin-left: -30px">
                    <a href="/penjual" style="width: 150px" class="btn btn-secondary">Rekomendasi</a>
                    <a href="/sejarah" style="width: 150px" class="btn btn-secondary">Sejarah</a>
                </div>
                @endguest
            </div>
           
        </div>

        
@endsection