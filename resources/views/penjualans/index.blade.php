@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Daftar Penjualan</h1>
    <a href="{{ route('penjualans.create') }}" class="btn btn-primary">Tambah Penjualan</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiket</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->id }}</td>
                    <td>{{ $penjualan->tiket->rute }}</td>
                    <td>{{ $penjualan->jumlah }}</td>
                    <td>{{ $penjualan->total_harga }}</td>
                    <td>
                        <a href="{{ route('penjualans.edit', $penjualan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('penjualans.destroy', $penjualan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
