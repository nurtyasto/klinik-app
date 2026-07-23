<x-app-layout>
    <x-slot name="header">
        Data Poliklinik
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-medium text-gray-800">Daftar Layanan Poliklinik</h3>
            <a href="{{ route('polyclinics.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors shadow-sm">
                + Tambah Poliklinik
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-y border-gray-200 text-gray-600 text-sm">
                        <th class="p-4 font-semibold">Nama Poliklinik</th>
                        <th class="p-4 font-semibold">Biaya Layanan</th>
                        <th class="p-4 font-semibold">Deskripsi</th>
                        <th class="p-4 font-semibold w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($polyclinics as $poli)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-medium text-gray-900">{{ $poli->name }}</td>
                        <td class="p-4 text-green-600 font-medium">Rp {{ number_format($poli->cost, 0, ',', '.') }}</td>
                        <td class="p-4 text-gray-600">{{ $poli->description ?? '-' }}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('polyclinics.edit', $poli) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                <form action="{{ route('polyclinics.destroy', $poli) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus poliklinik {{ $poli->name }}?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500">Belum ada data poliklinik terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>