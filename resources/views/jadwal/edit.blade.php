@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jadwal</h1>
    <form action="{{ route('jadwal.update', $jadwal) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_satpam" class="form-label">ID Satpam</label>
            <input type="number" class="form-control" id="id_satpam" name="id_satpam" value="{{ $jadwal->id_satpam }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="shift" class="form-label">Shift</label>
            <input type="text" class="form-control" id="shift" name="shift" value="{{ $jadwal->shift }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
