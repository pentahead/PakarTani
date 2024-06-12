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
        <img id="tanaman-image" src="" alt="Plant Image" style="width: 1000px; height: 700px; object-fit: cover;">
    </div>
    <div class="paragraf" id="tanaman-deskripsi">
        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const token = localStorage.getItem('token');
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    if (id) {
        if (token) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/tanamans/${id}`,
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(data) {
                    $('#tanaman-name').text(data.nama_tanaman);
                    $('#tanaman-image').attr('src', data.gambar_url);
                    $('#tanaman-deskripsi').html(data.deskripsi);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        } else {
            window.location.href = '/login'; // Redirect to login if no token is found
        }
    } else {
        $('#tanaman-name').text('Plant not found');
        $('#tanaman-deskripsi').text('No description available');
    }
});
</script>
@endsection
