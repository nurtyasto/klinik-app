<x-app-layout>
    <x-slot name="header">
        Edit Poliklinik: {{ $polyclinic->name }}
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 max-w-2xl">
        <form action="{{ route('polyclinics.update', $polyclinic) }}" method="POST">
            @csrf 
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Poliklinik *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $polyclinic->name) }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" 
                       required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cost">Biaya Layanan (Rp) *</label>
                <input type="number" name="cost" id="cost" value="{{ old('cost', $polyclinic->cost) }}" min="0"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('cost') border-red-500 @enderror" 
                       required>
                @error('cost') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Deskripsi Keterangan *</label>
                <textarea name="description" id="description" rows="3" 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror" 
                          required>{{ old('description', $polyclinic->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    Perbarui Data
                </button>
                <a href="{{ route('polyclinics.index') }}" class="text-gray-600 font-medium hover:text-gray-800 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>