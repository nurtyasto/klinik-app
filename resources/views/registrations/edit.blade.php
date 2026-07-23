<x-app-layout>
    <x-slot name="header">
        Pemeriksaan Dokter
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 max-w-3xl">
        
        <!-- Informasi Kunjungan (Read Only) -->
        <div class="mb-6 bg-blue-50 p-5 rounded-lg border border-blue-100">
            <h4 class="text-blue-800 font-bold mb-3 border-b border-blue-200 pb-2 flex items-center justify-between">
                <span>Informasi Kunjungan</span>
                <span class="text-sm font-normal text-blue-600">No RM: {{ $registration->patient->no ?? '-' }}</span>
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div><span class="font-semibold text-gray-700">Nama Pasien:</span> {{ $registration->patient->name ?? '-' }}</div>
                <div><span class="font-semibold text-gray-700">Umur:</span> {{ $registration->patient->age ?? '-' }} Tahun</div>
                <div><span class="font-semibold text-gray-700">Poliklinik:</span> {{ $registration->polyclinic->name ?? '-' }}</div>
                <div><span class="font-semibold text-gray-700">Tanggal:</span> {{ \Carbon\Carbon::parse($registration->date)->format('d F Y') }}</div>
                <div class="col-span-1 md:col-span-2 mt-2">
                    <span class="font-semibold text-gray-700 block mb-1">Keluhan Awal:</span>
                    <div class="bg-white p-3 border border-blue-100 rounded text-gray-700">
                        {{ $registration->complaint }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Pengisian Diagnosis & Tindakan oleh Dokter -->
        <form action="{{ route('registrations.update', $registration) }}" method="POST">
            @csrf 
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="diagnosis">Diagnosis Medis *</label>
                <textarea name="diagnosis" id="diagnosis" rows="4" 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 @error('diagnosis') border-red-500 @enderror" 
                          placeholder="Masukkan hasil diagnosis pemeriksaan dokter..." required>{{ old('diagnosis', $registration->diagnosis) }}</textarea>
                @error('diagnosis') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="action">Tindakan / Resep Obat *</label>
                <textarea name="action" id="action" rows="4" 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 @error('action') border-red-500 @enderror" 
                          placeholder="Tuliskan tindakan medis yang dilakukan atau resep obat yang diberikan..." required>{{ old('action', $registration->action) }}</textarea>
                @error('action') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-green-700 transition-colors shadow-sm">
                    Simpan Hasil Pemeriksaan
                </button>
                <a href="{{ route('registrations.index') }}" class="text-gray-600 font-medium hover:text-gray-800 hover:underline">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>