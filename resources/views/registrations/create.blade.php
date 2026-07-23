<x-app-layout>
    <x-slot name="header">
        Pendaftaran Pasien Berobat
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 max-w-2xl">
        <form action="{{ route('registrations.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="patient_id">Pilih Pasien *</label>
                <select name="patient_id" id="patient_id" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('patient_id') border-red-500 @enderror" required>
                    <option value="">-- Cari & Pilih Pasien --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                            {{ $patient->no }} - {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
                @error('patient_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="polyclinic_id">Pilih Poliklinik Tujuan *</label>
                <select name="polyclinic_id" id="polyclinic_id" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('polyclinic_id') border-red-500 @enderror" required>
                    <option value="">-- Pilih Poliklinik --</option>
                    @foreach($polyclinics as $poli)
                        <option value="{{ $poli->id }}" {{ old('polyclinic_id') == $poli->id ? 'selected' : '' }}>
                            {{ $poli->name }} (Biaya: Rp {{ number_format($poli->cost, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('polyclinic_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Tanggal Berobat *</label>
                <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="complaint">Keluhan Awal Pasien *</label>
                <textarea name="complaint" id="complaint" rows="3" 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('complaint') border-red-500 @enderror" 
                          placeholder="Tuliskan keluhan yang dirasakan pasien..." required>{{ old('complaint') }}</textarea>
                @error('complaint') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    Daftarkan Antrean
                </button>
                <a href="{{ route('registrations.index') }}" class="text-gray-600 font-medium hover:text-gray-800 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>