@extends('layouts.app')

@section('title', 'Jadwal Tugas Satpam')

@section('content')
    <div class="container">
        <h1>Jadwal Tugas Satpam</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Tugas</a>

        <table class="table table-striped table-bordered">
            <thead>
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
                                <span class="badge badge-warning">Pending</span>
                            @elseif($jadwal->status == 'in_progress')
                                <span class="badge badge-info">In Progress</span>
                            @elseif($jadwal->status == 'completed')
                                <span class="badge badge-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            @if($jadwal->status != 'completed')
                                <a href="{{ route('jadwal.updateStatus', $jadwal->id) }}" class="btn btn-success btn-sm">Tandai Selesai</a>
                            @endif
                            <a href="{{ route('laporankejadian.index') }}" class="btn btn-info btn-sm">Laporan</a>
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
@endsection