<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\JadwalTugas;
use App\Models\Satpam;
use App\Models\User;
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

    // Metode untuk menampilkan form edit
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);  // Find the Jadwal by ID
        $satpams = Satpam::all();  // Fetch all Satpam records
        return view('jadwal.edit', compact('jadwal', 'satpams'));  // Pass both Jadwal and Satpam data to the view
    }
    

    // In your JadwalTugasController.php
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'id_satpam' => 'required|exists:satpams,id', // Ensure id_satpam exists in the satpams table
            'tanggal' => 'required|date',
            'shift' => 'required|in:pagi,malam',
            'area' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // Find the jadwal by its ID
        $jadwal = Jadwal::findOrFail($id);

        // Update the jadwal with the validated data
        $jadwal->update([
            'id_satpam' => $request->id_satpam,
            'tanggal' => $request->tanggal,
            'shift' => $request->shift,
            'area' => $request->area,
            'status' => $request->status,
        ]);

        // Redirect with success message
        return redirect()->route('jadwal.index')->with('success', 'Jadwal updated successfully');
    }
}
