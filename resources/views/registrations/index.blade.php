<x-app-layout>
    <x-slot name="header">
        Data Pendaftaran & Antrean
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-medium text-gray-800">Riwayat Kunjungan Pasien</h3>
            <a href="{{ route('registrations.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors shadow-sm">
                + Pendaftaran Berobat
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-y border-gray-200 text-gray-600 text-sm">
                        <th class="p-4 font-semibold">Tanggal</th>
                        <th class="p-4 font-semibold">Pasien</th>
                        <th class="p-4 font-semibold">Poli Tujuan</th>
                        <th class="p-4 font-semibold">Keluhan</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($registrations as $reg)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-medium text-gray-900">{{ \Carbon\Carbon::parse($reg->date)->format('d/m/Y') }}</td>
                        <td class="p-4 font-medium">{{ $reg->patient->name ?? 'Pasien Dihapus' }}</td>
                        <td class="p-4">{{ $reg->polyclinic->name ?? 'Poli Dihapus' }}</td>
                        <td class="p-4 text-gray-600">{{ Str::limit($reg->complaint, 40) }}</td>
                        <td class="p-4">
                            @if($reg->diagnosis)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Sudah Diperiksa
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('registrations.edit', $reg) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                    {{ $reg->diagnosis ? 'Detail' : 'Periksa' }}
                                </a>
                                <form action="{{ route('registrations.destroy', $reg) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kunjungan ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">Belum ada data pendaftaran kunjungan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>