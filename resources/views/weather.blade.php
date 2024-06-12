@extends('layouts.app')

@section('background-styles')
style="background-image: url('{{ asset('images/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection

@section('content')
<div class="container-fluid my-5 p-4">
    <div class="row justify-content-center m-4">
      <div class="search-container">
        <span class="search-icon"><i class="fas fa-search"></i></span>
        <input type="text" id="locationInput" placeholder="Search..." />
        <span class="arrow-icon" id="searchButton"><i class="fas fa-arrow-right"></i></span>
      </div>
    </div>
    <div class="row justify-content-center m-4">
      <div class="weather-card" id="weatherCard" style="display: none;">
        <img id="weatherIcon" src="" alt="Weather Icon" class="weather-icon" />
        <div class="weather-info">
          <div class="temperature" id="temperature"></div>
          <div class="description" id="description"></div>
          <div class="location" id="location"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchWeather('Jember');  // Fetch weather for the default location on page load
    });

    document.getElementById('searchButton').addEventListener('click', function() {
        let location = document.getElementById('locationInput').value;
        if (location) {
            fetchWeather(location);
        }
    });

    function fetchWeather(location) {
        fetch(`{{ route('weather.get') }}?location=${location}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('weatherCard').style.display = 'block';
                    document.getElementById('weatherIcon').src = `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
                    document.getElementById('temperature').textContent = `${data.main.temp}°C`;
                    document.getElementById('description').textContent = data.weather[0].description;
                    document.getElementById('location').textContent = data.name + ', ' + data.sys.country;
                }
            })
            .catch(error => {
                console.error('Error fetching weather data:', error);
                alert('Could not fetch weather data');
            });
    }
  </script>
@endsection
