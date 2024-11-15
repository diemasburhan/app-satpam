@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Satpam</h1>
    <form action="{{ route('satpam.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="shift" class="form-label">Shift</label>
            <input type="text" class="form-control" id="shift" name="shift" required>
        </div>
        <div class="mb-3">
            <label for="pos" class="form-label">Pos</label>
            <input type="text" class="form-control" id="pos" name="pos" required>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
