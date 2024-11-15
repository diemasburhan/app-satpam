<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\JadwalTugas;
use App\Models\Satpam;
use Illuminate\Http\Request;

class JadwalTugasController extends Controller
{
    // Menampilkan Jadwal Tugas
    public function index()
    {
        // Ambil semua jadwal tugas
        $jadwalTugas = JadwalTugas::orderBy('tanggal', 'asc')->get();

        return view('jadwal.index', compact('jadwalTugas'));
    }

    // Menambahkan Jadwal Tugas Baru
    public function create()
    {
        $satpams = Satpam::all(); // Ambil semua data satpam
        return view('jadwal.create', compact('satpams'));
    }

    // Menyimpan Jadwal Tugas Baru
    public function store(Request $request)
    {
        $request->validate([
            'satpam_id' => 'required|exists:satpams,id',
            'tanggal' => 'required|date',
            'shift' => 'required|string',
            'area' => 'required|string',
        ]);

        JadwalTugas::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal Tugas berhasil ditambahkan.');
    }

    // Menandai Tugas sebagai Selesai
    public function updateStatus($id, Request $request)
    {
        // Validasi data
        $request->validate([
            'status' => 'required|string',
        ]);

        // Cari jadwal berdasarkan ID
        $jadwal = Jadwal::findOrFail($id); // Pastikan model Jadwal ada
        $jadwal->status = $request->input('status');
        $jadwal->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
