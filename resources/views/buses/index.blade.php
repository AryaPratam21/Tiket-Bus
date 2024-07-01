@extends('layouts.dashboard')

@section('title', 'Daftar Bus')

@section('content')
<div class="container">
    <h1>Daftar Bus</h1>
    <a href="{{ route('buses.create') }}" class="btn btn-primary">Tambah Bus</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor Polisi</th>
                <th>Kapasitas</th>
                <th>Nomor Kursi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buses as $bus)
                <tr>
                    <td>{{ $bus->id }}</td>
                    <td>{{ $bus->nama }}</td>
                    <td>{{ $bus->nomor_polisi }}</td>
                    <td>{{ $bus->kapasitas }}</td>
                    <td>{{ $bus->nomor_kursi }}</td>
                    <td>
                        <a href="{{ route('buses.edit', $bus->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('buses.destroy', $bus->id) }}" method="POST" style="display:inline;">
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
