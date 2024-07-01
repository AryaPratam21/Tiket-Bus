@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penjualan</h1>
    <form action="{{ route('penjualans.update', $penjualan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tiket_id">Tiket</label>
            <select name="tiket_id" id="tiket_id" class="form-control">
                @foreach ($tikets as $tiket)
                    <option value="{{ $tiket->id }}" {{ $tiket->id == $penjualan->tiket_id ? 'selected' : '' }}>{{ $tiket->rute }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $penjualan->jumlah }}">
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="text" name="total_harga" id="total_harga" class="form-control" value="{{ $penjualan->total_harga }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('penjualans.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
