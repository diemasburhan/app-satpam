@extends('layouts.app')

@section('title', 'Daftar Laporan Kejadian')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center">Daftar Laporan Kejadian</h1>
        </div>
        <div class="card-body">
            <div class="mb-3 text-center">
                <a href="{{ route('laporankejadian.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Laporan
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporans as $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->judul }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $laporan->gambar) }}" alt="Gambar" class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <a href="{{ route('laporankejadian.show', $laporan) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                <a href="{{ route('laporankejadian.edit', $laporan) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada laporan kejadian</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
