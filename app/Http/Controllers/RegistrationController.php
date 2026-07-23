<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Polyclinic;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Menampilkan daftar semua pendaftaran/antrean
     */
    public function index()
    {
        // Mengambil data pendaftaran beserta relasi pasien dan poliklinik, urut dari yang terbaru
        $registrations = Registration::with(['patient', 'polyclinic'])->latest()->get();
        return view('registrations.index', compact('registrations'));
    }

    /**
     * Menampilkan form pendaftaran pasien ke poliklinik
     */
    public function create()
    {
        // Mengambil semua data pasien dan poli untuk ditampilkan di dropdown form
        $patients = Patient::orderBy('name', 'asc')->get();
        $polyclinics = Polyclinic::all();
        
        return view('registrations.create', compact('patients', 'polyclinics'));
    }

    /**
     * Menyimpan data pendaftaran baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'polyclinic_id' => 'required|exists:polyclinics,id',
            'date' => 'required|date',
            'complaint' => 'required|string|max:255',
        ]);

        Registration::create($validated);
        
        return redirect()->route('registrations.index')
                         ->with('success', 'Pendaftaran berobat berhasil ditambahkan!');
    }

    /**
     * Menampilkan form pemeriksaan untuk dokter (mengisi diagnosis dan tindakan)
     */
    public function edit(Registration $registration)
    {
        // Memuat form edit beserta data pendaftaran spesifik yang akan diperiksa
        return view('registrations.edit', compact('registration'));
    }

    /**
     * Menyimpan hasil pemeriksaan (diagnosis dan tindakan) dari dokter
     */
    public function update(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'diagnosis' => 'required|string',
            'action' => 'required|string',
        ]);
        
        $registration->update($validated);
        
        return redirect()->route('registrations.index')
                         ->with('success', 'Hasil pemeriksaan dan diagnosis berhasil disimpan!');
    }

    /**
     * Menghapus riwayat pendaftaran
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();
        
        return redirect()->route('registrations.index')
                         ->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}