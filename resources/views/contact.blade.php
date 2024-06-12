@extends('layouts.app')

@section('background-styles')
style="background-image: url('{{ asset('image/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection

@section('content')
<div class="harga">
        <h1>Our Contact</h1>
        <hr>
      </div>

      <div class="contai">
        <form>
            
            <input type="text" id="name" placeholder="Enter Your Name" required>
            <input type="email" id="email" placeholder="Enter Your Email" required>
            <input type="phone" id="phone" placeholder="Enter Your Phone Number" required>

            <textarea id="message" rows="4" placeholder="Write Something"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

    <div class="footer-section">
        <div class="footer-item">
            <h2>PakarTani</h2>
            <p><a href="home.html"> Home </a></p>
            <p><a href="about.html"> About Us </a></p>
            <p><a href="informasi.html"> Informasi </a></p>
            <p><a href="cuaca.html"> Cuaca </a></p>
            <p><a href="harga_pasar.html"> Harga pasar </a></p>
        </div>
        <div class="footer-item">
            <h2>Get Help </h2>
            <p><a href=""> FAQ</a></p>
            <p><a href=""> Contact</a></p>
        </div>
        <div class="footer-item">
            <h2>Information</h2>
            <p><a href=""> Blogs </a></p>
            <p><a href=""> Artikel </a></p>
        </div>
        <div class="footer-item social">
          <h2> Follow Us </h2>
          <p><a href=""><i class="icon fa-brands fa-instagram"></i></a> <a href=""><i class="icon fa-brands fa-linkedin-in"></i></a> <a href=""><i class="icon fa-brands fa-youtube"></i></a> <a href=""><i class="icon fa-brands fa-twitter"></i></a></p>
        </div>
      </div>
      @endsection

