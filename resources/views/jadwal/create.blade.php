@extends('layouts.app')

@section('title', 'Tambah  Tugas')

@section('content')
    <div class="container">
        <h1>Tambah Jadwal Tugas</h1>

        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="satpam_id" class="form-label">Satpam</label>
                <select id="satpam_id" name="satpam_id" class="form-control" required>
                    <option value="">Pilih Satpam</option>
                    @foreach($satpams as $satpam)
                        <option value="{{ $satpam->id }}">{{ $satpam->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="mb-3">
                <label for="shift" class="form-label">Shift</label>
                <select class="form-control" id="shift" name="shift" required>
                    <option value="Pagi">Pagi</option>
                    <option value="Malam">Malam</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="area" class="form-label">Area</label>
                <input type="text" class="form-control" id="area" name="area" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
