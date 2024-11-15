@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pemeriksaan Rutin</h1>
    
    <a href="{{ route('routine-check.create') }}" class="btn btn-primary mb-3">Tambah Pemeriksaan</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemeriksaan</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routineChecks as $check)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $check->name }}</td>
                    <td>{{ $check->description }}</td>
                    <td>
                        <form action="{{ route('routine-check.updateStatus', $check->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="checked" value="1" {{ $check->checked ? 'checked' : '' }} onChange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('routine-check.edit', $check->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
