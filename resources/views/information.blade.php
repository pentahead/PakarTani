@extends('layouts.app')



@section('content')
<div class="harga">
    <h1>Informasi Tanaman</h1>
    <p>Dapatkan informasi terkini tentang pertanian, manajemen pertanian, cuaca, harga pasar, dan berita terbaru di satu tempat!</p>
    <hr>
</div>
<div id="tanaman-container" class="contener"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let token = localStorage.getItem('token');

        function fetchTanamanData(token) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/tanamans',
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
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
                error: function(xhr) {
                    // Handle errors
                    console.error(xhr);
                }
            });
        }

        if (token) {
            fetchTanamanData(token);
        } else {
            window.location.href = '/login'; // Redirect to login if no token is found
        }
    });
</script>
@endsection
