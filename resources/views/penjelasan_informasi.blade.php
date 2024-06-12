@extends('layouts.app')

@section('background-styles')
style="background-image: url('{{ asset('images/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection

@section('content')


<div class="harga">
    <h1 id="tanaman-name">Loading...</h1>
    <hr>
</div>

<div class="contenr">
    <div class="hero">
        <img id="tanaman-image" src="" alt="Plant Image" style="width: 1000px; height: 600px; object-fit: cover;">
    </div>
    <div class="paragraf">
        <p id="tanaman-deskripsi">Loading...</p>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    if (id) {
        $.ajax({
            url: `/api/tanamans/${id}`,
            method: 'GET',
            success: function(data) {
                $('#tanaman-name').text(data.nama_tanaman);
                $('#tanaman-image').attr('src', data.gambar_url);
                $('#tanaman-deskripsi').text(data.deskripsi);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    } else {
        $('#tanaman-name').text('Plant not found');
        $('#tanaman-deskripsi').text('No description available');
    }
});
</script>
@endsection
