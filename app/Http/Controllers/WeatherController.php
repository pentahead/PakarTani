<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $location = $request->input('location');
        
        $apiKey = '33e8bdef63762ef264e7eaa7868bf175';
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$location}&units=metric&appid={$apiKey}";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Could not fetch weather data'], 500);
        }
    }
}
