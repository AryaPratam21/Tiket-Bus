@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bus</h1>
    <form action="{{ route('buses.update', $bus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $bus->nama }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" name="nomor_polisi" id="nomor_polisi" class="form-control" value="{{ $bus->nomor_polisi }}" required>
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ $bus->kapasitas }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_kursi">Nomor Kursi</label>
            <input type="number" name="nomor_kursi" id="nomor_kursi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="{{ route('buses.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
