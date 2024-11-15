@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $laporankejadian->judul }}</h1>
    <p>{{ $laporankejadian->deskripsi }}</p>
    <img src="{{ asset('storage/' . $laporankejadian->gambar) }}" alt="Gambar" width="400">
    <br>
    <a href="{{ route('laporankejadian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
