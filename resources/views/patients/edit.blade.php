<x-app-layout>
    <x-slot name="header">
        Edit Data Pasien: {{ $patient->name }}
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 max-w-2xl">
        <!-- Tambahkan enctype multipart/form-data untuk mendukung upload file -->
        <form action="{{ route('patients.update', $patient) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- No Rekam Medis (Read-Only) -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="no">No Rekam Medis</label>
                <input type="text" id="no" value="{{ $patient->no }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-700 font-semibold cursor-not-allowed" 
                       readonly>
                <p class="text-xs text-gray-500 mt-1">Nomor Rekam Medis bersifat permanen dan tidak dapat diubah.</p>
            </div>

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Lengkap *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $patient->name) }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" 
                       required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Jenis Kelamin *</label>
                <select name="gender" id="gender" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('gender') border-red-500 @enderror" required>
                    <option value="Laki-laki" {{ old('gender', $patient->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender', $patient->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Umur -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">Umur (Tahun) *</label>
                <input type="number" name="age" id="age" value="{{ old('age', $patient->age) }}" min="0" max="150"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('age') border-red-500 @enderror" 
                       required>
                @error('age') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Foto Pasien -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Foto Pasien</label>
                
                @if($patient->photo)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $patient->photo) }}" alt="Foto {{ $patient->name }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm">
                        <span class="text-xs text-gray-500">Foto saat ini (unggah file baru di bawah jika ingin menggantinya)</span>
                    </div>
                @endif

                <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg"
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg @error('photo') border-red-500 @enderror">
                <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Alamat Lengkap</label>
                <textarea name="address" id="address" rows="3" 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('address') border-red-500 @enderror">{{ old('address', $patient->address) }}</textarea>
                @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    Perbarui Data
                </button>
                <a href="{{ route('patients.index') }}" class="text-gray-600 font-medium hover:text-gray-800 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>