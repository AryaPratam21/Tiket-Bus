<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nomor_polisi', 'kapasitas', 'nomor_kursi'
    ];

    // Definisikan relasi ke model Tiket
    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
