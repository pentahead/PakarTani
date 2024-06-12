@extends('layouts.app')
@section('background-styles')
style="background-image: url('{{ asset('image/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection
@section('content')
<div class="harga">
    <h1>Informasi Tanaman</h1>
    <p>Dapatkan informasi terkini tentang pertanian, manajemen pertanian, cuaca, harga pasar, dan berita terbaru di satu tempat!</p>
    <hr>
</div>
<div id="tanaman-container" class="contener">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: '/api/tanamans',
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
            var container = $('#tanaman-container');
            var columnsCount = 0; // Counter for the number of columns
            var columnsHtml = ''; // HTML string to store the columns

            data.forEach(function(tanaman, index) {
                // Check if a new column needs to be created
                if (index % 3 === 0) {
                    // Close the previous column if it exists
                    if (columnsCount > 0) {
                        columnsHtml += '</div>'; // Close the previous column
                    }
                    columnsHtml += '<div class="colom">'; // Start a new column
                    columnsCount++;
                }

                // Append the card to the current column
                columnsHtml += `
                    <div class="gambar">
                        <div class="card">
                            <div class="card-inner">
                                <div class="front-card">
                                    <img src="${tanaman.gambar_url}" alt="${tanaman.nama_tanaman}">
                                </div>
                                <div class="back-card">
                                    <a href="penjelasan_informasi?id=${tanaman.id}">Detail Content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            // Close the last column
            columnsHtml += '</div>';

            // Append the columns to the container
            container.html(columnsHtml);
        },
        error: function(error) {
            console.log(error);
        }
    });
});
</script>
@endsection