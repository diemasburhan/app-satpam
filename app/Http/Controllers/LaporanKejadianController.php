<?php

namespace App\Http\Controllers;

use App\Models\LaporanKejadian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanKejadianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = LaporanKejadian::latest()->get();
        return view('laporankejadian.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporankejadian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('laporan', 'public');
            $validatedData['gambar'] = $path;
        }

        LaporanKejadian::create($validatedData);

        return redirect()->route('laporankejadian.index')->with('success', 'Laporan kejadian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanKejadian $laporankejadian)
    {
        return view('laporankejadian.show', compact('laporankejadian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanKejadian $laporankejadian)
    {
        return view('laporankejadian.edit', compact('laporankejadian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanKejadian $laporankejadian)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($laporankejadian->gambar && Storage::exists('public/' . $laporankejadian->gambar)) {
                Storage::delete('public/' . $laporankejadian->gambar);
            }

            $path = $request->file('gambar')->store('laporan_gambar', 'public');
            $validatedData['gambar'] = $path;
        }

        $laporankejadian->update($validatedData);

        return redirect()->route('laporankejadian.index')->with('success', 'Laporan kejadian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanKejadian $laporankejadian)
    {
        if ($laporankejadian->gambar && Storage::exists('public/' . $laporankejadian->gambar)) {
            Storage::delete('public/' . $laporankejadian->gambar);
        }

        $laporankejadian->delete();
        return redirect()->route('laporankejadian.index')->with('success', 'Laporan kejadian berhasil dihapus.');
    }
}