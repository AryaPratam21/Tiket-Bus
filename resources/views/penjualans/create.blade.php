@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Penjualan</h1>
    <form action="{{ route('penjualans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tiket_id">Tiket</label>
            <select name="tiket_id" id="tiket_id" class="form-control">
                @foreach ($tikets as $tiket)
                    <option value="{{ $tiket->id }}">{{ $tiket->rute }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control">
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="text" name="total_harga" id="total_harga" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('penjualans.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
