@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Satpam</h1>
    <p><strong>Nama:</strong> {{ $satpam->nama }}</p>
    <p><strong>Shift:</strong> {{ $satpam->shift }}</p>
    <p><strong>Pos:</strong> {{ $satpam->pos }}</p>
    <p><strong>Kontak:</strong> {{ $satpam->kontak }}</p>
    <a href="{{ route('satpam.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
