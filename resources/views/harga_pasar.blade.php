@extends('layouts.app')

@section('content')
<div class="harga">
    <h1>Informasi Harga Pasar</h1>
    <hr>
</div>

<div class="table-container" id="market-prices-container">
    <!-- Data will be populated here by JavaScript -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let token = localStorage.getItem('token');

        function fetchMarketPrices(token) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/marketprices',
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(data) {
                    let container = $('#market-prices-container');
                    container.empty();
                    data.forEach(function(item) {
                        let tableItem = `
                            <div class="table-item">
                                <h2 class="price">Rp.${item.price_per_kg}/kg</h2>
                                <h2 class="heading">${item.product_name.toUpperCase()}</h2>
                                <img src="${item.image_url}" alt="${item.product_name}">
                                <article class="content">
                                    <p>${item.description || 'No description available.'}</p>
                                </article>
                            </div>
                        `;
                        container.append(tableItem);
                    });
                },
                error: function(xhr) {
                    // Handle errors
                }
            });
        }

        if (token) {
            fetchMarketPrices(token);
        } else {
            window.location.href = '/login'; // Redirect to login if no token is found
        }
    });
</script>
@endsection
