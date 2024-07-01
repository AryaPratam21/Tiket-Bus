<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Bus;

class TiketController extends Controller
{
    public function index()
    {
    $tikets = Tiket::with('bus')->get();
    return view('tikets.index', compact('tikets'));
    }


    public function create()
    {
        $buses = Bus::all();
        return view('tikets.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'rute' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $tiket = new Tiket();
        $tiket->bus_id = $request->bus_id;
        $tiket->rute = $request->rute;
        $tiket->harga = $request->harga;
        $tiket->tanggal = $request->tanggal;
        $tiket->save();

        return redirect()->route('tikets.index');
    }

    public function edit($id)
    {
        $tiket = Tiket::find($id);
        $buses = Bus::all();
        return view('tikets.edit', compact('tiket', 'buses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'rute' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $tiket = Tiket::find($id);
        $tiket->bus_id = $request->bus_id;
        $tiket->rute = $request->rute;
        $tiket->harga = $request->harga;
        $tiket->tanggal = $request->tanggal;
        $tiket->save();

        return redirect()->route('tikets.index');
    }

    public function destroy($id)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();
        return redirect()->route('tikets.index');
    }
}

