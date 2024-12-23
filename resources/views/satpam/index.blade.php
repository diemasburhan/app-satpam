@extends('layouts.app')

@section('title', 'Daftar Satpam')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center">Daftar Satpam</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('satpam.create') }}" class="btn btn-primary mb-3">Tambah Satpam</a>

            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Shift</th>
                        <th>Pos</th>
                        <th>Kontak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satpams as $satpam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $satpam->nama }}</td>
                            <td>{{ $satpam->shift }}</td>
                            <td>{{ $satpam->pos }}</td>
                            <td>{{ $satpam->kontak }}</td>
                            <td>
                                <a href="{{ route('satpam.edit', $satpam) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
