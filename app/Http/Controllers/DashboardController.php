<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKejadian;
use App\Models\Satpam;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch data using the 'created_at' field
        $data = LaporanKejadian::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                                ->groupBy('month')
                                ->orderBy('month')
                                ->pluck('count', 'month')->toArray();

        // Fill missing months with 0
        $chartData = [];
        for ($month = 1; $month <= 12; $month++) {
            $chartData[] = $data[$month] ?? 0;
        }

        // Data contoh untuk ditampilkan di dashboard
        $laporanCount = LaporanKejadian::count();
        $satpamCount = Satpam::count();
        $recentLaporan = LaporanKejadian::latest()->take(5)->get();

        return view('dashboard.index', compact('chartData', 'laporanCount', 'satpamCount', 'recentLaporan'));
    }

    
}
