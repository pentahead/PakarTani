<?php
namespace App\Http\Controllers;


use App\Models\MarketPrice;
use Illuminate\Http\Request;

class MarketPriceController extends Controller
{
    public function index()
    {
        $marketPrices = MarketPrice::all();
        return response()->json($marketPrices);
    }

    public function show($id)
    {
        $marketPrice = MarketPrice::find($id);
        if (!$marketPrice) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($marketPrice);
    }
}
