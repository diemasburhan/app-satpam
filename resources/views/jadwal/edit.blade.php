@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center">Edit Jadwal Tugas Satpam</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('jadwal.update', $jadwal) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Satpam Select Dropdown -->
                <div class="mb-3">
                    <label for="id_satpam" class="form-label">Nama Satpam</label>
                    <select class="form-control" id="id_satpam" name="id_satpam" required>
                        <option value="" disabled>Pilih Satpam</option>
                        @foreach($satpams as $satpam)
                            <option value="{{ $satpam->id }}" 
                                    {{ $jadwal->id_satpam == $satpam->id ? 'selected' : '' }}>
                                {{ $satpam->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Input -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}" required>
                </div>

                <!-- Shift Input -->
                <div class="mb-3">
                    <label for="shift" class="form-label">Shift</label>
                    <select class="form-control" id="shift" name="shift" required>
                        <option value="pagi" {{ $jadwal->shift == 'pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="malam" {{ $jadwal->shift == 'malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>

                <!-- Area Input -->
                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" id="area" name="area" value="{{ $jadwal->area }}" required>
                </div>

                <!-- Status Select Dropdown -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="pending" {{ $jadwal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $jadwal->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $jadwal->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
