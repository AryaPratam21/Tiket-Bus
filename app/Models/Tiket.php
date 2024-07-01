<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id', 'rute', 'harga', 'tanggal'
    ];

    // Definisikan relasi ke model Bus
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    // Definisikan relasi ke model Penjualan
    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
