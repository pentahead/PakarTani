<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiTanaman;

class InformasiTanamanController extends Controller
{
    public function index()
    {
        $tanamans = InformasiTanaman::all();
        return response()->json($tanamans);
    }

    public function show($id)
    {
        $tanaman = InformasiTanaman::find($id);
        return response()->json($tanaman);
    }
}
