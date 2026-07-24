<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        // Logika generate No RM otomatis saat halaman form dibuka
        $lastPatient = Patient::orderBy('id', 'desc')->first();
        
        if ($lastPatient && preg_match('/^RM-(\d+)$/', $lastPatient->no, $matches)) {
            $lastNumber = (int)$matches[1];
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
        
        $nextNo = 'RM-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return view('patients.create', compact('nextNo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no' => 'required|string|max:16|unique:patients,no',
            'name' => 'required|string|max:100',
            'gender' => 'required|string|max:10',
            'age' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
            'address' => 'nullable|string|max:255',
        ]);

        // Tangani proses upload foto jika ada
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('patients', 'public');
        }

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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
            'address' => 'nullable|string|max:255',
        ]);

        // Tangani pembaruan foto
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($patient->photo && Storage::disk('public')->exists($patient->photo)) {
                Storage::disk('public')->delete($patient->photo);
            }
            // Simpan foto baru
            $validated['photo'] = $request->file('photo')->store('patients', 'public');
        }

        $patient->update($validated);
        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil diperbarui!');
    }

    public function destroy(Patient $patient)
    {
        // Hapus file foto dari storage jika pasien dihapus
        if ($patient->photo && Storage::disk('public')->exists($patient->photo)) {
            Storage::disk('public')->delete($patient->photo);
        }

        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil dihapus!');
    }
}