@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Laporan Kejadian</h1>
    <a href="{{ route('laporankejadian.create') }}" class="btn btn-primary mb-3">Tambah Laporan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporan->judul }}</td>
                    <td><img src="{{ asset('storage/' . $laporan->gambar) }}" alt="Gambar" width="100"></td>
                    <td>
                        <a href="{{ route('laporankejadian.show', $laporan) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('laporankejadian.edit', $laporan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('laporankejadian.destroy', $laporan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
