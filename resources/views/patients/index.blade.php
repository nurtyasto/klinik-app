<x-app-layout>
    <x-slot name="header">
        Data Pasien
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-medium text-gray-800">Daftar Pasien Terdaftar</h3>
            <a href="{{ route('patients.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors shadow-sm">
                + Tambah Pasien Baru
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-y border-gray-200 text-gray-600 text-sm">
                        <th class="p-4 font-semibold">Foto</th>
                        <th class="p-4 font-semibold">No RM</th>
                        <th class="p-4 font-semibold">Nama Pasien</th>
                        <th class="p-4 font-semibold">L/P</th>
                        <th class="p-4 font-semibold">Umur</th>
                        <th class="p-4 font-semibold">Alamat</th>
                        <th class="p-4 font-semibold w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($patients as $patient)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <!-- Kolom Foto Pasien -->
                        <td class="p-4">
                            @if($patient->photo)
                                <img src="{{ asset('storage/' . $patient->photo) }}" alt="Foto {{ $patient->name }}" class="w-10 h-10 object-cover rounded-full border border-gray-200 shadow-sm">
                            @else
                                <div class="w-10 h-10 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center font-bold text-xs">
                                    {{ strtoupper(substr($patient->name, 0, 2)) }}
                                </div>
                            @endif
                        </td>
                        <td class="p-4 font-medium text-gray-900">{{ $patient->no }}</td>
                        <td class="p-4 font-medium">{{ $patient->name }}</td>
                        <td class="p-4">{{ $patient->gender }}</td>
                        <td class="p-4">{{ $patient->age }} Thn</td>
                        <td class="p-4 text-gray-600">{{ $patient->address ?? '-' }}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('patients.edit', $patient) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                <form action="{{ route('patients.destroy', $patient) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pasien {{ $patient->name }}? Semua data pendaftarannya juga akan terhapus.')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">
                            Belum ada data pasien terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>