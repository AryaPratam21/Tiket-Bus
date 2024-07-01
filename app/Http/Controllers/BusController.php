<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all(); // Ambil semua data bus dari model Bus
        return view('buses.index', compact('buses'));
    }


    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_polisi' => 'required',
            'kapasitas' => 'required|integer',
            'nomor_kursi' => 'required|integer',
        ]);
        
        Bus::create($request->all());
        return redirect()->route('buses.index')->with('success', 'Bus berhasil ditambahkan.');
    }
    
    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }
    
    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_polisi' => 'required',
            'kapasitas' => 'required|integer',
            'nomor_kursi' => 'required|integer',
        ]);

        $bus->update($request->all());
        return redirect()->route('buses.index')->with('success', 'Bus berhasil diperbarui.');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'Bus berhasil dihapus.');
    }
}
