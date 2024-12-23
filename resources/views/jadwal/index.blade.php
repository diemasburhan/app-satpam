@extends('layouts.app')

@section('title', 'Jadwal Tugas Satpam')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center">Jadwal Tugas Satpam</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Tugas</a>

            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Satpam</th>
                        <th>Shift</th>
                        <th>Area</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalTugas as $jadwal)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($jadwal->created_at)->format('d-m-Y H:i') }}</td>
                            <td>{{ $jadwal->satpam->nama }}</td>
                            <td>{{ $jadwal->shift }}</td>
                            <td>{{ $jadwal->area }}</td>
                            <td>
                                @if($jadwal->status == 'pending')
                                    <span class="badge" style="color: rgb(0, 0, 0);">Pending</span>
                                @elseif($jadwal->status == 'in_progress')
                                    <span class="badge" style="color: rgb(0, 0, 0);">In Progress</span>
                                @elseif($jadwal->status == 'completed')
                                    <span class="badge" style="color: rgb(0, 0, 0);">Completed</span>
                                @endif
                            </td>
                            <td>
                                @if($jadwal->status != 'completed')
                                <form action="{{ route('jadwal.updateStatus', $jadwal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Tandai Selesai</button>
                                </form>
                                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
