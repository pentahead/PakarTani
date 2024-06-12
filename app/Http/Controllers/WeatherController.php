<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $location = $request->input('location');
        if (empty($location)) {
            return response()->json(['error' => 'Location parameter is required'], 400);
        }
        
        $apiKey = '3ba66a0becc007620c72f67d2c5c8bc1'; // Ensure this matches your API key
        $url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($location) . "&appid={$apiKey}&units=metric";
        
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                $status = $response->status();
                $error = $response->json()['message'] ?? 'Unknown error';
                return response()->json(['error' => "Error ($status): $error"], $status);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching weather data: ' . $e->getMessage()], 500);
        }
    }
}
