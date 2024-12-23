<?php

namespace App\Http\Controllers;

use App\Models\Satpam;
use Illuminate\Http\Request;


class SatpamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satpams = Satpam::all(); // Ambil semua data satpam
        return view('satpam.index', compact('satpams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satpam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'shift' => 'required|string',
            'pos' => 'required|string',
            'kontak' => 'required|string|max:15',
        ]);

        Satpam::create($request->all()); // Simpan data baru
        return redirect()->route('satpam.index')->with('success', 'Data Satpam berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('satpam.show', compact('satpam'));

    }

    public function edit(string $id)
    {
        $satpam = Satpam::findOrFail($id); // Find the satpam by id or fail
        return view('satpam.edit', compact('satpam')); // Pass satpam to the edit view
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satpam $satpam)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'shift' => 'required|string',
            'pos' => 'required|string',
            'kontak' => 'required|string|max:15',
        ]);

        $satpam->update($request->all()); // Update data
        return redirect()->route('satpam.index')->with('success', 'Data Satpam berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satpam $satpam)
    {
        $satpam->delete(); // Hapus data
        return redirect()->route('satpam.index')->with('success', 'Data Satpam berhasil dihapus.');
    }
}
