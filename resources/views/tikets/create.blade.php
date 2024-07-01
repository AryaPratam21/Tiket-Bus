@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Tiket</h1>
    <form action="{{ route('tikets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="bus_id">Bus</label>
            <select name="bus_id" id="bus_id" class="form-control">
                @foreach ($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rute">Rute</label>
            <input type="text" name="rute" id="rute" class="form-control">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('tikets.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
