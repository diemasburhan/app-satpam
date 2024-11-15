@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Satpam</h1>
    <a href="{{ route('satpam.create') }}" class="btn btn-primary mb-3">Tambah Satpam</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
                        <form action="{{ route('satpam.destroy', $satpam) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
