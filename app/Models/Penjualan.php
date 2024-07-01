<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiket_id', 'jumlah', 'total_harga'
    ];

    // Definisikan relasi ke model Tiket
    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
