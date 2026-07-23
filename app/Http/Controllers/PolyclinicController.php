<?php

namespace App\Http\Controllers;

use App\Models\Polyclinic;
use Illuminate\Http\Request;

class PolyclinicController extends Controller
{
    public function index()
    {
        $polyclinics = Polyclinic::all();
        return view('polyclinics.index', compact('polyclinics'));
    }

    public function create()
    {
        return view('polyclinics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'cost' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Polyclinic::create($validated);
        return redirect()->route('polyclinics.index')->with('success', 'Poliklinik berhasil ditambahkan!');
    }

    public function edit(Polyclinic $polyclinic)
    {
        return view('polyclinics.edit', compact('polyclinic'));
    }

    public function update(Request $request, Polyclinic $polyclinic)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'cost' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $polyclinic->update($validated);
        return redirect()->route('polyclinics.index')->with('success', 'Poliklinik berhasil diperbarui!');
    }

    public function destroy(Polyclinic $polyclinic)
    {
        $polyclinic->delete();
        return redirect()->route('polyclinics.index')->with('success', 'Poliklinik berhasil dihapus!');
    }
}