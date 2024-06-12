<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\WeatherController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'registerWeb']);
Route::post('/login', [AuthController::class, 'loginWeb']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/hargapasar', function () {
        return view('harga_pasar');
    })->name('harga_pasar');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/information', function () {
        return view('information');
    })->name('information');
    Route::get('/penjelasan_informasi', function () {
        return view('penjelasan_informasi');
    })->name('penjelasan_informasi');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::get('/weather', function () {
        return view('weather');
    })->name('weather');

    Route::get('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');

});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
