@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center">{{ $laporankejadian->judul }}</h1>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $laporankejadian->gambar) }}" alt="Gambar Laporan" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
            </div>
            <h5 class="mb-3">Deskripsi Kejadian</h5>
            <p class="card-text text-justify">{{ $laporankejadian->deskripsi }}</p>

            <hr>

            <!-- Timestamps -->
            <div class="text-muted">
                <p><strong>Dibuat pada:</strong> {{ $laporankejadian->created_at->format('d M Y, H:i') }}</p>
                <p><strong>Terakhir diperbarui:</strong> {{ $laporankejadian->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('laporankejadian.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Laporan
            </a>
        </div>
    </div>
</div>
@endsection
