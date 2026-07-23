<x-app-layout>
    <x-slot name="header">
        Tambah Data Pasien
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 max-w-2xl">
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            
            <!-- No Rekam Medis (Auto-generated dari Controller & Read-Only) -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="no">No Rekam Medis</label>
                <input type="text" name="no" id="no" value="{{ old('no', $nextNo) }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-700 font-semibold cursor-not-allowed @error('no') border-red-500 @enderror" 
                       readonly>
                <p class="text-xs text-gray-500 mt-1">Nomor ini di-generate otomatis berdasarkan urutan terakhir.</p>
                @error('no') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Lengkap *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" 
                       placeholder="Nama pasien" required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Jenis Kelamin *</label>
                <select name="gender" id="gender" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('gender') border-red-500 @enderror" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Umur -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">Umur (Tahun) *</label>
                <input type="number" name="age" id="age" value="{{ old('age') }}" min="0" max="150"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('age') border-red-500 @enderror" 
                       placeholder="Contoh: 25" required>
                @error('age') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Alamat Lengkap</label>
                <textarea name="address" id="address" rows="3" 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('address') border-red-500 @enderror" 
                          placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    Simpan Data
                </button>
                <a href="{{ route('patients.index') }}" class="text-gray-600 font-medium hover:text-gray-800 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>