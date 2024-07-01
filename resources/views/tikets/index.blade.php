@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Daftar Tiket</h1>
    <a href="{{ route('tikets.create') }}" class="btn btn-primary">Tambah Tiket</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bus</th>
                <th>Rute</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tikets as $tiket)
                <tr>
                    <td>{{ $tiket->id }}</td>
                    <td>{{ $tiket->bus->nama }}</td>
                    <td>{{ $tiket->rute }}</td>
                    <td>{{ $tiket->harga }}</td>
                    <td>{{ $tiket->tanggal }}</td>
                    <td>
                        <a href="{{ route('tikets.edit', $tiket->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tikets.destroy', $tiket->id) }}" method="POST" style="display:inline;">
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
