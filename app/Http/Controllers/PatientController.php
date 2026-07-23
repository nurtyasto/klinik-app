<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        // 1. Pindahkan logika generate No RM ke sini
        $lastPatient = Patient::orderBy('id', 'desc')->first();
        
        if ($lastPatient && preg_match('/^RM-(\d+)$/', $lastPatient->no, $matches)) {
            $lastNumber = (int)$matches[1];
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
        
        $nextNo = 'RM-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // 2. Kirim variabel $nextNo ke view
        return view('patients.create', compact('nextNo'));
    }

    public function store(Request $request)
    {
        // 3. Kembalikan validasi 'no', pastikan unique untuk menghindari bentrok 
        // jika ada 2 admin yang membuka form di saat bersamaan.
        $validated = $request->validate([
            'no' => 'required|string|max:16|unique:patients,no',
            'name' => 'required|string|max:100',
            'gender' => 'required|string|max:10',
            'age' => 'required|numeric',
            'address' => 'nullable|string|max:255',
        ]);

        Patient::create($validated);
        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil ditambahkan!');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'required|string|max:10',
            'age' => 'required|numeric',
            'address' => 'nullable|string|max:255',
        ]);

        $patient->update($validated);
        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil diperbarui!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil dihapus!');
    }
}