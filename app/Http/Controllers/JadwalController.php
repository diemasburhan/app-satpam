<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;


class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::all(); // Ambil semua data jadwal
        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'satpam_id' => 'required|exists:satpams,id',
            'tanggal' => 'required|date',
            'shift' => 'required|string',
            'area' => 'required|string',
        ]);

        Jadwal::create($request->all()); // Simpan data baru
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('jadwal.show', compact('jadwal'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Inside JadwalController.php
    public function updateStatus($id)
    {
        // Find the Jadwal by ID
        $jadwal = Jadwal::findOrFail($id);

        // Update the status (you can adjust this based on your requirements)
        $jadwal->status = 'completed'; // Or any status you want to set
        $jadwal->save();

        // Redirect back to the jadwal index page with a success message
        return redirect()->route('jadwal.index')->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete(); // Hapus data
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
