@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Laporan Kejadian</h1>
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
            <p>Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $laporankejadian->gambar) }}" alt="Gambar" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
