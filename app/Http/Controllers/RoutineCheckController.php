<?php

namespace App\Http\Controllers;

use App\Models\RoutineCheck;
use App\Models\User;
use Illuminate\Http\Request;

class RoutineCheckController extends Controller
{
    public function index()
    {
        $routineChecks = RoutineCheck::all();
        return view('routine-check.index', compact('routineChecks'));
    }

    public function create()
    {
        return view('routine-check.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'satpam_id' => 'required|exists:users,id',
        ]);

        RoutineCheck::create($request->all());
        $satpams = User::role('satpam')->get();
        return redirect()->route('routine-check.index')->with('status', 'Pemeriksaan Rutin berhasil ditambahkan!');
    }

    public function updateStatus(Request $request, $id)
    {
        $routineCheck = RoutineCheck::findOrFail($id);
        $routineCheck->checked = $request->checked;
        $routineCheck->save();  

        return redirect()->route('routine-check.index')->with('status', 'Status pemeriksaan diperbarui!');
    }
}
