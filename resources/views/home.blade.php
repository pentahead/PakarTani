@extends('layouts.app')

@section('background-styles')
style="background-image: url('{{ asset('image/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection

@section('content')
    <div class="container hero-1">
      <div class="row"></div>
      <div class="row">
        <div class="col-lg-8 ml-4">
          <div class="mb-4">
            <h3 class="text-light font-weight-bold">
              Selamat datang di <span style="color: #ffca5c">CROPADVISOR</span>,
              solusi pertanian modern untuk petani masa kini dan masa depan!
            </h3>
            <h1 class="text-light font-weight-bold">
              Dapatkan
              <span style="color: #ffca5c"
                >prakiraan cuaca terkini, informasi tentang tanaman, harga
                pasar, informasi</span
              >
              dan lebih banyak lagi dalam satu aplikasi.
            </h1>
          </div>
          <div>
            <a class="btn btn-light font-weight-bold p-2" href="/about">
              <span class="text">Learn More</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    
@endsection

