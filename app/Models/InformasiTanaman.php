<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiTanaman extends Model
{
    use HasFactory;

    // Specify the table if the table name is different from the plural of the model name
    protected $table = 'informasi_tanaman';

    // Define the fillable properties
    protected $fillable = [
        'nama_tanaman',
        'deskripsi',
        'gambar_url',
    ];
}
