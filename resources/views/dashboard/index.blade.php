@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row">
        <!-- Card Total Laporan -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Laporan Kejadian</h5>
                    <p class="card-text">{{ $laporanCount }}</p>
                </div>
            </div>
        </div>

        <!-- Card Total Satpam -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Satpam</h5>
                    <p class="card-text">{{ $satpamCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row">
        <div class="col-md-6">
            <canvas id="laporanChart"></canvas>
        </div>
    </div>

    <!-- Tabel Laporan Terbaru -->
    <div class="mt-4">
        <h4>Laporan Kejadian Terbaru</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentLaporan as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('laporankejadian.show', $laporan) }}" class="btn btn-sm btn-info">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        // Get the data passed from the controller
        var chartData = @json($chartData); // Laravel's way of converting PHP data to JavaScript

        var ctx = document.getElementById('laporanChart').getContext('2d');
        var laporanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Laporan Kejadian per Bulan',
                    data: chartData, // Use the dynamic data
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</script>
@endsection
