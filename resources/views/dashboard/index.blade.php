@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Dashboard</h1>

    <div class="row">
        <!-- Card Total Laporan -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-primary shadow-lg">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Laporan Kejadian</h5>
                        <p class="card-text fs-2">{{ $laporanCount }}</p>
                    </div>
                    <i class="bi bi-file-earmark-bar-graph fs-1"></i>
                </div>
            </div>
        </div>

        <!-- Card Total Satpam -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-success shadow-lg">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Satpam</h5>
                        <p class="card-text fs-2">{{ $satpamCount }}</p>
                    </div>
                    <i class="bi bi-person-circle fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row">
        <!-- Laporan Kejadian per Bulan -->
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Laporan Kejadian per Bulan</h5>
                    <canvas id="laporanChart"></canvas>
                </div>
            </div>
        </div>
    
        <!-- Waktu Saat Ini -->
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Waktu Saat Ini</h5>
                    <h5 id="currentDateTime" class="text-center"></h5>
                </div>
            </div>
        </div>
    </div>
    

    
    

    <!-- Tabel Laporan Terbaru -->
    <div class="mt-4">
        <h4>Laporan Kejadian Terbaru</h4>
        <div class="card shadow-lg">
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-light">
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
                                    <a href="{{ route('laporankejadian.show', $laporan) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk chart
    var chartData = @json($chartData);

    var ctx = document.getElementById('laporanChart').getContext('2d');
    var laporanChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Laporan Kejadian per Bulan',
                data: chartData,
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
            },
            responsive: true,
            maintainAspectRatio: true
        }
    });

    // Function untuk menampilkan waktu real-time
    function updateDateTime() {
        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const dayName = days[now.getDay()];
        const date = now.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
        const time = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        document.getElementById('currentDateTime').innerHTML = `${dayName}, ${date} ${time}`;
    }

    // Jalankan updateDateTime setiap detik
    setInterval(updateDateTime, 1000);

    // Panggil langsung saat halaman dimuat
    updateDateTime();
</script>
@endsection
