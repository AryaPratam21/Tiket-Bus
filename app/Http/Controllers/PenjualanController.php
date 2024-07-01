<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Tiket;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('tiket')->get();
        return view('penjualans.index', compact('penjualans'));
    }
    

    public function create()
    {
        $tikets = Tiket::all();
        return view('penjualans.create', compact('tikets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tiket_id' => 'required|exists:tikets,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $penjualan = new Penjualan();
        $penjualan->tiket_id = $request->tiket_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->save();

        return redirect()->route('penjualans.index');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::find($id);
        $tikets = Tiket::all();
        return view('penjualans.edit', compact('penjualan', 'tikets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tiket_id' => 'required|exists:tikets,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $penjualan = Penjualan::find($id);
        $penjualan->tiket_id = $request->tiket_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->save();

        return redirect()->route('penjualans.index');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return redirect()->route('penjualans.index');
    }
}

