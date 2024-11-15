@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Jadwal</h1>
    <p><strong>ID Satpam:</strong> {{ $jadwal->id_satpam }}</p>
    <p><strong>Tanggal:</strong> {{ $jadwal->tanggal }}</p>
    <p><strong>Shift:</strong> {{ $jadwal->shift }}</p>
    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
