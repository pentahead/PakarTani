@extends('layouts.app')

@section('background-styles')
style="background-image: url('{{ asset('images/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection

@section('content')
<!-- <div class="harga">
    <h1>About Us</h1>
    <hr>
  </div> -->

  <section id="aboutUs">
    <img src="image/elaine-casap-qgHGDbbSNm8-unsplash.jpg" alt="computer user">
    <div class="contentt">
        <h2>About Us</h2>
        <h4> Pertanian Modern </h4>
        <p class="description">
          Selamat datang di CROPADVISOR, solusi pertanian modern untuk petani 
          masa kini dan masa depan! Kami hadir untuk memberdayakan petani 
          dengan teknologi canggih dan informasi terkini, guna meningkatkan 
          hasil dan kesejahteraan pertanian. 
          CROPADVISOR menawarkan fitur-fitur utama:
          Prakiraan Cuaca Terkini: Informasi cuaca akurat untuk perencanaan aktivitas pertanian. 
          Informasi Tanaman: Panduan lengkap perawatan dan budidaya berbagai jenis tanaman. 
          Harga Pasar: Update harga pasar terkini untuk keputusan pembelian yang cerdas. 
          Kami berkomitmen mendukung pertumbuhan dan keberhasilan usaha pertanian Anda. Bergabunglah dengan komunitas petani yang sudah merasakan manfaat dari solusi cerdas kami. Bersama, kita wujudkan <br> pertanian yang lebih maju dan berkelanjutan!
        </p>
    </div>
  </section>
  @endsection