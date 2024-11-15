@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pemeriksaan Rutin</h1>

    <form method="POST" action="{{ route('routine-check.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Pemeriksaan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="satpam_id" class="form-label">Petugas Satpam</label>
            <select class="form-select" id="satpam_id" name="satpam_id" required>
                @foreach($satpams as $satpam)
                    <option value="{{ $satpam->id }}">{{ $satpam->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
    </form>
</div>
@endsection
