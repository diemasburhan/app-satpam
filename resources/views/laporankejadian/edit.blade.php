@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center">Edit Laporan Kejadian</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('laporankejadian.update', $laporankejadian) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $laporankejadian->judul }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $laporankejadian->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Baru (Opsional)</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if ($laporankejadian->gambar)
                        <div class="mt-3">
                            <p>Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $laporankejadian->gambar) }}" alt="Gambar" class="img-fluid rounded" width="100">
                        </div>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('laporankejadian.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Laporan
            </a>
        </div>
    </div>
</div>
@endsection
